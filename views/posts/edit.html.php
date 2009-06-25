<h2>Edit post</h2>

<?= render('post/_form.html.php', null, array('post' => $post)); ?>

<p>
  <a href="<?=url_for('posts');?>" onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_method'); m.setAttribute('value', 'DELETE'); f.appendChild(m); f.submit(); };return false;">Delete this post</a>
</p>