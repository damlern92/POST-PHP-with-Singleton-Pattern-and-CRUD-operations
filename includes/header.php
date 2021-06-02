<?php

include_once "config.php";
// Make a new object of the Posts class:
$post = new Posts();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="style/srt.css">
		<title></title>
	</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div id="logo">
				<a href="./">All Posts</a>
			</div> <!-- End of logo -->
			<div id="nav">
				<ul>
		          	<!-- <li><a href="./">Home</a></li> -->
		          	<li>
		            	<a href="insert_post.php">Insert post</a>
		          	</li>
				</ul>
			</div> <!-- end of nav -->
		</div><!-- end of #header -->

		 <!-- Page Content: -->
		<div id="main">


