<?php include_once "includes/header.php"; ?>

<h2>Update Post</h2>

<?php

// Isset $_GET['updata'] from index.php page
	if(isset($_GET['update'])){
		$post_id = $_GET['update'];
		$getPost = $post->getPostById($post_id);
	}

// Fetch the data from database:
	while($result = $getPost->fetch_object()){
		$id = $result->id;
		$title = $result->title;
		$content = $result->content;
		$image = $result->image;
		$cat_id = $result->cat_id;
	}

?>


<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$updatePost = $post->updatePost($_POST, $id, $_FILES);
	}

	// Showing the message:
	if(isset($updatePost)){
		echo $updatePost;
	}
?>

<!-- the Form below: -->
<form action="#" method="post" enctype="multipart/form-data">
		<br>

	    <label for="frmName">Title:</label>
	    <input type="text" id="frmName" name="title" value="<?php echo $title; ?>">
	    <br><br>

		<label for="sell">Select Category:</label>
		<select name="cat_id" id="sel1">
			<?php
			// Get category by id:
			$getCat = $post->getCategoryById($cat_id);
				while($result = $getCat->fetch_object()) {
					$cat_id = $result->category_id;
					$cat_title = $result->category_title;
					echo "<option value='$cat_id'>$cat_title</option>";
					echo "<p> <a href='update_posts.php?update=<?php echo $result->id ?>'>Update</a></p>";

					// Get all categories from database:
						$getCat = $post->getAllCategories();
						while($result = $getCat->fetch_object()) {
							$cat_id = $result->category_id;
							$cat_title = $result->category_title;
							echo "<option value='$cat_id'>$cat_title</option>";
							echo "<p> <a href='update_posts.php?update=<?php echo $result->id ?>'>Update</a></p>";
						}

				} // END of first while loop
			?>

		</select>
		<br><br>

		<!-- Showing the message in the form: -->
		<label for="image">Image:</label>
		<input type="file" name="post_image" id="image"><br><br>
		<img src="images/<?php echo $image; ?>" width="60px" height="60px">
		<br><br>

		<label for="frmText">Your message:</label><br>
	    <textarea name="content" id="frmText" rows="3" cols="30"><?php echo $content; ?></textarea>
	    <br><br>

	    <input type="submit" name="submit" value="Update" id="frmSubmit">

</form>
