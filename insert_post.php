<?php 

include_once "includes/header.php";

 ?>

<h2>Insert new Post</h2>

<?php
	// PART 1:
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		// pass parameters to insertNewPost method:
		$insertPost = $post->insertNewPost($_POST);
	}

	if(isset($insertPost)){ // Show the message
		echo $insertPost;
	}
?>
	

	 <!-- PART 2: -->
<form action="#" method="post" enctype="multipart/form-data">
	<br>
    <label for="frmName">Title:</label>
    <input type="text" id="frmName" name="title">
    <br><br>

    <!-- Select: -->
	<label for="sell">Select Category:</label>
	<select name="cat_id" id="sel1">
		<option value="null">Select Category</option>
		<?php
		// The Categories from mySQL database:
			$getCat = $post->getAllCategories();
			while($result = $getCat->fetch_object()) {
				$cat_id = $result->category_id;
				$cat_title = $result->category_title;
				echo "<option value='$cat_id'>$cat_title</option>";
			}
		?>
	</select>

	<br><br>

	<!-- Input field 4: -->
	<label for="image">Image:</label>
	<input type="file" name="post_image" id="image">
	<br><br>

	<label for="frmText">Your message:</label><br>
    <textarea name="content" id="frmText" rows="3" cols="30"></textarea>
    <br><br>


    <input type="submit" name="submit" value="Insert" id="frmSubmit">
    <input type="reset" name="frmReset" value="Reset" id="frmReset">

</form>
