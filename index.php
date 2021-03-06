<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require("db.php");

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {

	return $response->withRedirect('Location', 'view/main.php');
});


if (isset($_SESSION['loggedIn'])) {

	$app->get('/selectAll/{report}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		$dataName = $args['report'];

		if ($dataName == 'likes') {
			$rows = $db->fetch("SELECT
								COUNT(l.post_id) AS c 
							FROM
								`like` l
							GROUP BY l.post_id ORDER BY c DESC LIMIT 1");
			return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
		} else if ($dataName == 'postRecent') {
			$rows = $db->fetch("SELECT p.title
									,p.id
									,(SELECT u.name from user u where u.id = p.user_id) as post_by
									,(SELECT u.image from user u where u.id = p.user_id) as image
									,(SELECT count(*) from maju_pms.like l where l.post_id = p.id) as numbers_of_likes
									,p.created_at as post_time
							FROM post p
							ORDER BY p.created_at DESC LIMIT 3");
			return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
		}
	});

	if (in_array(1, $_SESSION['access'])) {
		// states access  session #################################################
		$app->get('/countChart/{report}/{startDate}/{endDate}/{pageSize}/{pageNo}', function (Request $request, Response $response, array $args) {
			require_once('api/database.php');
			require_once('api/variables.php');
			$reportName = $args['report'];
			$rows = $db->fetch("SELECT DATE(created_at) as day
							,count(*) as c
						FROM `$reportName`
						WHERE created_at BETWEEN '$startDate' AND '$endDate' 
						Group by day
						LIMIT $startPoint , $pageSize");
			return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
		});
	}
	// session end ###################################

	$app->get('/users/profile', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		$rows = $db->fetch("SELECT
							u.id
							,( SELECT r.`role_name` FROM `role` r WHERE r.`id` = u.`role_id`) AS role_name
							,u.name
							,u.maju_id
							,u.image
							,u.created_at
							,u.last_login	
						FROM `user` u");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});
	$app->get('/post/all/{pageSize}/{pageNo}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');

		$pageNo = $args['pageNo'];
		$pageSize = $args['pageSize'];
		$startPoint = ($pageNo * $pageSize) - $pageSize;

		$rows = $db->fetch("SELECT
							( SELECT u.`name` FROM `user` u WHERE u.`id` = p.`user_id`) AS name
							,( SELECT u.`image` FROM `user` u WHERE u.`id` = p.`user_id`) AS image
							,p.*	
						FROM `post` p ORDER BY p.created_at DESC  LIMIT $startPoint , $pageSize");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});


	$app->get('/post/{id}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');

		$id = $args['id'];

		$rows = $db->fetch("SELECT
							( SELECT u.`name` FROM `user` u WHERE u.`id` = p.`user_id`) AS name
							,( SELECT u.`image` FROM `user` u WHERE u.`id` = p.`user_id`) AS image
							,p.*	
						FROM `post` p WHERE p.id = $id ORDER BY p.created_at DESC");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});

	$app->get('/postsOfUser/{id}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');

		$id = $args['id'];

		$rows = $db->fetch("SELECT
							( SELECT u.`name` FROM `user` u WHERE u.`id` = p.`user_id`) AS name
							,( SELECT u.`image` FROM `user` u WHERE u.`id` = p.`user_id`) AS image
							,p.*	
						FROM `post` p WHERE p.user_id = $id ORDER BY p.created_at DESC");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});


	$app->get('/like/{post_id}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		$post_id = $args['post_id'];
		$rows = $db->fetch("SELECT 
						l.*
						,( SELECT u.`name` FROM `user` u WHERE u.`id` = l.`user_id`) AS name
						,( SELECT u.`image` FROM `user` u WHERE u.`id` = l.`user_id`) AS image
						FROM `like` l WHERE l.post_id = $post_id");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});
	$app->get('/comments/{post_id}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		$post_id = $args['post_id'];
		$rows = $db->fetch("SELECT 
						*
						FROM `comment` l WHERE l.post_id = $post_id");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});


	$app->get('/comments/{parent_comment_id}/{post_id}', function (Request $request, Response $response, array $args) {

		require_once('api/database.php');
		$parent_comment_id = $args['parent_comment_id'];
		$post_id = $args['post_id'];

		$rows = $db->fetch("SELECT 
							c.*
							,( SELECT u.`name` FROM `user` u WHERE u.`id` = c.`user_id`) AS name
							,( SELECT u.`image` FROM `user` u WHERE u.`id` = c.`user_id`) AS image 
						FROM comment c 
						WHERE post_id = $post_id
						ORDER BY id DESC");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});

	// search filters ##############################################################################
	$app->get('/userPostSearch/{startDate}/{endDate}/{fromLike}/{toLike}/{searchPost}/{userComment}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		//variables mapAll
		$startDate = date("Y-m-d 00:00:00", strtotime($args['startDate']));
		$endDate = date("Y-m-d 23:59:59", strtotime($args['endDate']));

		$fromLike = $args['fromLike'];
		$toLike = $args['toLike'];

		//search post *************************************
		if ($args['searchPost'] == 'false') {
			$searchPost = 1;
		} else {
			$searchPost = " `title` LIKE '%" . $args['searchPost'] . "%' OR  `description` LIKE '%" . $args['searchPost'] . "%'";
		}

		//comment post *************************************
		if ($args['userComment'] == 'All') {
			$userComment = 'ORDER BY p.created_at DESC';
		} else if ($args['userComment'] == '+ve') {
			$userComment = 'ORDER BY positive_comments DESC, negative_comments ASC';
		} else if ($args['userComment'] == '-ve') {
			$userComment = 'ORDER BY negative_comments DESC, positive_comments ASC';
		}

		$rows = $db->fetch("SELECT
							 (SELECT u.`name` FROM `user` u WHERE u.`id` = p.`user_id`) AS name
							,( SELECT u.`image` FROM `user` u WHERE u.`id` = p.`user_id`) AS image
							,(SELECT COUNT(*) FROM `like` l WHERE l.`post_id` = p.`id`) AS likes
							,(SELECT COUNT(*) FROM `comment` c WHERE c.`post_id` = p.`id`) AS comments
							,(SELECT COUNT(comment_type_id) FROM `comment` c WHERE c.`post_id` = p.`id` AND comment_type_id = '1') AS positive_comments
							,(SELECT COUNT(comment_type_id) FROM `comment` c WHERE c.`post_id` = p.`id` AND comment_type_id = '2') AS negative_comments
							,p.*	
						FROM `post` p 
						WHERE 
							p.created_at BETWEEN '$startDate' AND '$endDate'
							AND $searchPost 
						HAVING likes BETWEEN $fromLike AND $toLike
						$userComment");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});


	// charts repports #########################################################################

	$app->get('/dataTable/user/{startDate}/{endDate}/{pageSize}/{pageNo}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		require_once('api/variables.php');
		$rows = $db->fetch("SELECT u.name
						,(SELECT r.role_name from role r where r.id = u.role_id) as role
						,u.maju_id
						,u.created_at as signup_time
						FROM user u;
						WHERE u.created_at BETWEEN '$startDate' AND '$endDate'
						ORDER BY u.created_at DESC
						LIMIT $startPoint , $pageSize");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});


	$app->get('/dataTable/post/{startDate}/{endDate}/{pageSize}/{pageNo}', function (Request $request, Response $response, array $args) {
		require_once('api/database.php');
		require_once('api/variables.php');
		$rows = $db->fetch("SELECT p.title
						, p.description
						,(SELECT u.name from user u where u.id = p.user_id) as post_by
						,(SELECT u.maju_id from user u where u.id = p.user_id) as user_id
						,(SELECT count(*) from maju_pms.like l where l.post_id = p.id) as numbers_of_likes
						,p.post_marks
						,p.created_at as post_time
						FROM post p
						WHERE p.created_at BETWEEN '$startDate' AND '$endDate'
						ORDER BY p.created_at DESC
						LIMIT $startPoint , $pageSize");
		return $response->withJson(array('status' => true, 'row' => $rows, 'message' => ''));
	});
} else {
	header('HTTP/1.0 403 Forbidden');
}


$app->run();
