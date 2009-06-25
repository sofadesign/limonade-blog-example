
<? 
  $action = empty($post['id']) ? url_for('posts') : $url_for('posts', $post['id']);
  $method = empty($post['id']) ? 'POST' : 'PUT'; 
?>
<form action="<?=$action?>" method="<?=$method?>">
  <fieldset id="post_form">
    <legend>Post</legend>
    <p>
      <label for="post_title">Title</label>
      <input type="text" name="post[title]" value="<?=h($post['title']);?>" id="post_title">
    </p>
    <p>
      <label for="post_body">Body</label>
      <textarea name="post['body']" id="post_body"rows="8" cols="40"><?=h($post['body']);?></textarea>
    </p>
    
    <p><input type="submit" value="<?= empty($post['id']) ? "Create" : "Update" ?> &rarr;"></p>
  </fieldset>
</form>