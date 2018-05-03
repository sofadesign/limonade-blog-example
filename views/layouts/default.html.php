<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Limonade blog example</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Fabrice Luraine">
	<!-- Date: 2009-06-25 -->
</head>
<body>
  <h1>Limonade blog example</h1>
  <div id="content">
    <?php echo $content; ?>
  </div>
<hr>
<p id="nav">
  <a href="<?php echo url_for('posts')?>">List all posts</a> | 
  <a href="<?php echo url_for('posts','new')?>">Create a new post</a> 
</p>
</body>
</html>
