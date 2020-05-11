<?php

class Posts{

	private $db;
	public function __construct(){
		$this->db = Database::getInstance();
	}

	public function getAllCategories(){
		$query = "SELECT * FROM categories";
		$getCat = $this->db->select($query);
		return $getCat;
	}

	public function getAllPosts(){
		$query = "SELECT * FROM posts ORDER BY id DESC LIMIT 4";
		$getposts = $this->db->select($query);
		return $getposts;
	}

	public function insertNewPost($post){
		// Check the data from the form:
		$title = mysqli_real_escape_string($this->db->link, $post['title']);
		$cat_id = mysqli_real_escape_string($this->db->link, $post['cat_id']);
		$content = mysqli_real_escape_string($this->db->link, $post['content']);

		$image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];

		$uploaded_image = "images/".$image;
		move_uploaded_file($image_tmp, $uploaded_image);

		// Insert data to database:
		$query = "INSERT INTO posts(title, cat_id, content, image) VALUES ('$title', '$cat_id', '$content','$image')";
		$insert = $this->db->insert($query);

		if($insert){ // Show the message:
			$msg = "<span style='color:green'>Post inserted successfully.</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Post is not inserted.</span>";
			return $msg;
		}
	}

	// This method takes the parameter from the form:
	public function getPostById($post_id){
		$query = "SELECT * FROM posts WHERE id = '$post_id'";
		$getpost = $this->db->select($query);
		return $getpost; // Return the result
	}

	public function getCategoryById($cat_id){
		$query = "SELECT * FROM categories WHERE category_id = '$cat_id'";
		$getCat = $this->db->select($query);
		return $getCat;
	}


	public function updatePost($post, $id, $file){
		$title = mysqli_real_escape_string($this->db->link, $post['title']);
		$cat_id = mysqli_real_escape_string($this->db->link, $post['cat_id']);
		$content = mysqli_real_escape_string($this->db->link, $post['content']);

		$image = $file['post_image']['name'];
		$image_tmp = $file['post_image']['tmp_name'];

		move_uploaded_file($image_tmp, "images/".$image);

		$query = "UPDATE posts SET
			title = '$title',
			cat_id = '$cat_id',
			content = '$content',
			image = '$image'
			WHERE id = '$id'";

		$updated_row = $this->db->update($query);

		if($updated_row){
			$msg = "<span style='color:green'>Post updated successfully.</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Error! Post is not updated.</span>";
			return $msg;
		}

	}

	public function delPostById($id){
		// deleting the image:
		$query = "SELECT * FROM posts WHERE id = '$id'";
		$getImage = $this->db->select($query);
		if($getImage){
			while($delImg = $getImage->fetch_assoc()){
				$delLink = $delImg['image'];
				unlink("images/".$delLink);
			}
		}

		$query1 = "DELETE FROM posts WHERE id = '$id'";
		$delPost = $this->db->delete($query1);


		if($delPost){
			$msg = "<span style='color:green'>Post deleted successfully.</span>";
			return $msg;
		}else{
			$msg = "<span style='color:red'>Error! Post is not deleted.</span>";
			return $msg;
		}
	}

} // End of class Posts
