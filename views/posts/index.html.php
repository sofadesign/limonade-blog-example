<div id="posts">
  <? if(empty($posts)): ?>
  <p>No posts</p>
  <? else: ?>
    <?
      foreach($posts as $post)
      {
        echo render('posts/_post.html.php', null, array('post'=>$post));
      }
    ?>
  <? endif; ?>
</div>