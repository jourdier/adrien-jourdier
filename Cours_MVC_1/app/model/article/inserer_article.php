<?php

	function inserer_article($article, $user_id)
	{
		global $pdo;

		try
		{
			$req = "INSERT INTO blog_posts(post_author, post_category, post_content, post_title)
					VALUES (:post_author, :post_category, :post_content, :post_title)";

			$query = $pdo->prepare($req);

			$query->bindValue(':post_author', $user_id, PDO::PARAM_INT);
			$query->bindValue(':post_category', $article["post_category"], PDO::PARAM_INT);
			$query->bindValue(':post_content', $article["post_content"], PDO::PARAM_STR);
			$query->bindValue(':post_title', $article["post_title"], PDO::PARAM_STR);

			$query->execute();

			//Récupération de l'ID
			return $pdo->lastInsertId();
		}

		catch(Exception $e)
		{
			return false;
		}
	}