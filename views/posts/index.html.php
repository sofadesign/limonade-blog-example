<div id="posts">
  <?php if(empty($posts)): ?>
  <p>No posts</p>
  <?php else: ?>
    <?
      foreach($posts as $post)
      {
        echo render('posts/_post.html.php', null, array('post'=>$post));
      }
    ?>
  <?php endif; ?>
</div>