<?php

require_once('lib/limonade');

# Setting global options of our application
function configure()
{
  $localhost = preg_match('/^localhost(\:\d+)?/', $_SERVER['HTTP_HOST']);
  $env =  $localhost ? ENV_DEVELOPMENT : ENV_PRODUCTION;
	$dsn = $env == ENV_PRODUCTION ? 'sqlite:db/prod.db' : 'sqlite:db/dev.db';
	$db = new PDO($slcted_db);
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  option('env', $env);
	option('db_conn', $db);
	setlocale(LC_TIME, "fr_FR");
}


# will be executed bfore each controller function
function before()
{
  html_layout('layouts/default.html.php');
}

# Defining routes and controllers
# ----------------------------------------------------------------------------
# RESTFul map:
#
# GET    /posts             blog_posts_index
# GET    /posts/:id         blog_posts_show 
# GET    /posts/new         blog_posts_new 
# POST   /posts             blog_posts_create
# GET    /posts/:id/edit    blog_posts_edit 
# PUT    /posts/:id         blog_posts_update
# DELETE /posts/:id         blog_posts_destroy
# GET    /                  blog_posts_home (redirect to /posts)

# matches GET /
dispatch('/', 'blog_posts_home');
  function blog_posts_home()
  {
    redirect(url_for('posts'));
  }

# matches GET /posts  
dispatch('/posts', 'blog_posts_index')
  function blog_posts_index()
  {
    $posts = post_find_all();
    set('posts', $posts);
    html('posts/index.html.php');
  }
  
# matches GET /posts/1  
dispatch('/posts/:id', 'blog_posts_show')
  function blog_posts_show()
  { 
    if( $post = post_find(params('id')) )
    {
      set('post', $post);
      html('posts/show.html.php');
    }
    else
    {
      halt(NOT_FOUND, "This post doesn't exists");
    }
    
  }
  
# matches GET /posts/new  
dispatch('/posts/new', 'blog_posts_new')
  function blog_posts_new()
  { 
    # passing an empty post to the view
    set('post', array('id'=>'', 'title'=>'Your title here...', 'body'=>'Your content...'));
    html('posts/new.html.php');
  }
  
# matches POST /posts
dispatch_post('/posts', 'blog_posts_create')
  function blog_posts_create()
  { 
    if($post_id = post_create($_POST['post']))
    {
      redirect(url_for('posts', $post_id));
    }
    else
    {
      halt(SERVER_ERROR, "AN error occurd while trying to create a new post")
    }
  }
  
# matches GET /posts/1/edit  
dispatch('/posts/:id/edit', 'blog_posts_edit')
  function blog_posts_edit()
  {
    if($post = post_find(params('id')))
    {
      set('post', $post);
      html('posts/edit.html.php');
    }
    else
    {
      halt(NOT_FOUND, "This post doesn't exists. Can't edit it.");
    }
  }
  
# matches PUT /posts/1
dispatch_put('/posts/:id', 'blog_posts_update')
  function blog_posts_update()
  {
    $post_id = params('id');
    if(post_update($post_id, $_POST['post']))
    {
      redirect(url_for('posts', $post_id));
    }
    else
    {
      halt(SERVER_ERROR, "An error occured while trying to update post ".$post_id);
    }
  }
  
# matches DELETE /posts/1
dispatch_delete('/posts/:id', 'blog_posts_destroy')
  function blog_posts_destroy()
  {
    $post_id = params('id');
    if($post = post_destroy($post_id))
    {
      redirect(url_for('posts'));
    }
    else
    {
      halt(SERVER_ERROR, "An error occured while trying to destroy post ".$post_id);
    }
  }


?>

