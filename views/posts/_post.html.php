<div class="post" id="post-<?=$post['id'];?>">
  <h2><?=h($post['title'])?></h2>
  <p class="date">Modified at: <?=strftime('%c', strtotime($post['updated_at']))?></p>
  <div class="content">
    <?=h($post['title'])?>
  </div>
</div>