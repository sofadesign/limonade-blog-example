<div class="post" id="post-<?php echo $post['id'];?>">
  <h2><?php echo h($post['title'])?></h2>
  <p class="date">Modified at: <?php echo strftime('%c', strtotime($post['modified_at']))?></p>
  <div class="content">
    <?php echo h($post['body'])?>
  </div>
  <p>
    <a href="<?php echo  url_for('posts', $post['id']); ?>">show</a> | 
    <a href="<?php echo url_for('posts', $post['id'], 'edit'); ?>">edit</a> |
    <a href="<?php echo  url_for('posts', $post['id']);?>" onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_method'); m.setAttribute('value', 'DELETE'); f.appendChild(m); f.submit(); };return false;">delete</a>
  </p>
</div>
