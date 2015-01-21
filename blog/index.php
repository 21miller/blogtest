<?php require('includes/config.php'); ?>

<!DOCTYPE html>
<html Lang="en">
<head>
	<meta charset='utf-8'>
	<title>Rod's Blog</title>
	<link rel="stylesheets" href="style/normal.css">
	<link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">
		<h1>Blog</h1>
		<hr />
		
<?php 
	try{
		
		$stmt = $db->query('SELECT postID, postTitle, postDedc, PostDate FROM blog_posts ORDER by postID DESC');
		while($row = $stmt->fetch()){
		
		
			echo '<div>';
				echo '<h1><a href="viewpost.php?id='.$row['postTitle'].'</a><h1>
				echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postDesc']."</p>';
				echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
			echo '</div>';
			}
		} catch(PDOException $e) {
		echo $e->getMessage();
		
		}
?>

	</div>
	
</body>
</html>