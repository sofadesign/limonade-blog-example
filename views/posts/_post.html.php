<div class="post" id="post-<?=$post['id'];?>">
  <h2><?=h($post['title'])?></h2>
  <p class="date">Modified at: <?=strftime('%c', strtotime($post['modified_at']))?></p>
  <div class="content">
    <?=h($post['body'])?>
  </div>
  <p>
    <a href="<?= url_for('posts', $post['id']); ?>">show</a> | 
    <a href="<?= url_for('posts', $post['id'], 'edit'); ?>">edit</a> |
    <a href="<?= url_for('posts', $post['id']);?>" onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_method'); m.setAttribute('value', 'DELETE'); f.appendChild(m); f.submit(); };return false;">delete</a>
  </p>
</div>