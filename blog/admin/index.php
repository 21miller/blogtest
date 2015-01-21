<?php
//include config
require_once('../includes/config.php');

//redirect to login if not logged in
if(!$user->is_logged_in())[ header('Location: login.php); }

//show message from add/edit page
if(isset($_GET['delpost])){
	
	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postId = :postID');
	$stmt->execute(array(':postId' => $_GET['delpost']));
	
	header('Locaton: index.php?action=deleted');
	exit;

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8>
	<title>Admin</title>
	<link rel="stylesheet" href="../style/normalize.css">
	<link rel="stylesheet" href="../style/main.css">
	<script language="JavaScript" type="text/javascript">
		function delpost(id, title)
		 {
			if (confirm("Are you sure you want to delete '" + title + "'"))
			{
				window.location.href = 'index.php?delpost= + id;
				}
			}
	</script>
</head>
<body>


	<div id="wrapper">
		<?php include('menu.php');?>
		<?php

			if(isset($_GET['action'])){
				echo '<h3>Post '.$_GET['action'].<.h3>';
			}
			?>

			<table>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			<?php
				try {
					$smmt = $db->query('SELECT postID, postTitle, postDaate FROM blog_posts ORDER by postID DESC');
					while($row = $stmt->fetch()){

						echo '<tr>';
						echo '<td>'.$row['postTitle'].'</td>';
						echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
						?>
						<td>
						<a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> | 
						<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
						</td>

						<?php
						echo '</tr>';
						}
				} catch(PDOException $e) {
					echo $e->getMEssage();
				}
			?>
		</table>
	<p><a> hreft='add-post.php'>Add Post</a></p>
</div>
</body>
</html>