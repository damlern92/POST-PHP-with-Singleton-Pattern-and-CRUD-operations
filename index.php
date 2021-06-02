<!-- *****INDEX.PHP TEMPLATE -->
  <?php 

    include('includes/header.php'); 

    // check $_GET['delpost'] parameter for deleting the post:
    // $_GET['delpost'] is from this page:
      if(isset($_GET['delpost'])){
        $id = $_GET['delpost'];
        $delPost = $post->delPostById($id);
      }

    // Show the message if isset $delPost:
      if(isset($delPost)){
        echo $delPost;
      }

  ?>

      <h1>Welcome to admin panel</h1>
      <p>
        This is Singleton project with CRUD operations, in this project I'm showing how to update delete and insert post with Singleton patern and CRUD operations.
      </p>
 
    <h2 style="padding-left:200px;">List of posts content:</h2>
    <!-- Post Content: -->
      <?php
      // The Second part of HTML included in this page:
      // method getAllPosts() is defined in the Post class:
        $getPosts = $post->getAllPosts();
        while($result = $getPosts->fetch_object()){
      ?>
     
          <img src="images/<?php echo $result->image; ?>" alt="" style="width:200px; height:auto">
            <div>
              <h4><?php echo $result->title; ?></h4>
              <p><?php echo $result->content; ?></p>
              <a href="update_posts.php?update=<?php echo $result->id; ?>">Edit Post</a>
              <!-- Deleting the post: -->
              <a onclick="return confirm('Da li ste sigurni da li zelite da obrisete ovaj post')" href="?delpost=<?php echo $result->id; ?>" >Delete Post</a>
            </div><br><br>

      <?php } ?>

<?php  include('includes/footer.php'); ?>


