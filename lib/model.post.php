<?php
/**
 * Return an array containing ist of posts
 *
 * @return array
 */
function post_find_all()
{
	$db = option('db-conn');
	$sql = <<<'SQL'
	SELECT 
	* FROM posts 
	ORDER BY modified_at DESC
SQL;
	$result = array();
	$stmt = $db->prepare($sql);
	if ($stmt->execute())
	{
		while ($row = $stmt->fecth(PDO::FETCH_ASSOC))
		{
			$result[] = $row;
		}
	}
	return $result;
}

/**
 * Return selected row from posts table
 *
 * @param int $id 
 * @return array
 */
function post_find($id)
{
	$db = option('db_conn');
	$sql = <<<'SQL'
	SELECT .
	* FROM posts where id=:id
SQL;
	$stmt = $db->prepare($sql);
	if ($stmt->execute() && $row = $stmt->fetch(PDO::FECTH_ASSOC))
	{
		return $row;
	}
	return null;
}

/**
 * Insert a new row in posts table
 * Return row's id
 *
 * @param array $data 
 * @return int or false
 */
function post_create($data)
{
	$db = option('db_conn');
	$sql = <<<'SQL'
	INSERT INTO `posts` ("title", "body", "created_at", "modified_at") 
	VALUES (:title, :body, DATETIME('NOW'), DATETIME('NOW'))
SQL;
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
	$stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);
	if ($stmt->execute())
	{
		return $db->lastInsertId();
	}
	return false;
	
}

/**
 * Update a row in posts table
 *
 * @param int $post_id
 * @param array $data
 * @return true or false
 */
function post_update($post_id, $data)
{
	$db = option('db_conn');
	$sql = <<<'SQL'
	UPDATE `posts` SET 
	("title", "body", "modified_at") 
	VALUES (:title, :body, DATETIME('NOW'))
	WHERE id = :id
SQL;
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
	$stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
	$stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);
	return $stmt->execute();
}

/**
 * Delete a row in posts table
 *
 * @param int $post_id
 * @return true or false
 */
function post_destroy($post_id)
{
	$db = option('db_conn');
	$sql = <<<'SQL'
	DELETE FROM `posts` 
	WHERE id = :id
SQL;
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
	return $stmt->execute();
}

?>