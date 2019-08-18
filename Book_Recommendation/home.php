<!DOCTYPE html>
<html>
<head>
	<title>Online Book Recommendation</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./stylesheet.css">
	<script type="text/javascript" src="./books.js"></script>
</head>
<body style="padding-bottom: 2rem">
	<nav class="navbar navbar-expand-lg navbar-inverse">
		<a class="navbar-brand white-color" href="#" style="color: white"><span class="glyphicon glyphicon-book"></span> Book Recommender</a>
	</nav>
	<div class="container">
		<div class="row">
			<form onsubmit="return searchBooks()" method="POST">
				<div class="col-md-4">
					<input type="text" id="title" class="form-control" name="book_title" placeholder="Book Title">
				</div>
				<div class="col-md-3">
					<input type="text" id="auth" class="form-control" name="author" placeholder="Author">
				</div>
				<div class="col-md-2">
					<select class="form-control" id="rating">
						<option selected="" disabled="" value="Rating">Rating</option>
						<option value="Rating">All</option>
						<option value="5">5 stars</option>
						<option value="4">4 stars</option>
						<option value="3">3 stars</option>
						<option value="2">2 stars</option>
						<option value="1">1 star1</option>
					</select>
				</div>
				<div class="col-md-3">
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
				<!-- </div>
				<div class="col-md-2"> -->
					<button class="btn btn-link" onclick="return resetForm()"><span class="glyphicon glyphicon-remove"></span> Clear Search</button>
				</div>
			</form>
		</div>
		<br>
		<?php
			$host = 'localhost';
			$user = 'root';
			$pwd = '';
			$db = 'book_recom';
			$con = mysqli_connect($host, $user, $pwd, $db);
			// mysql_select_db("book_repo");
			$res = mysqli_query($con,"SELECT * FROM book_repo order by book_name asc");
			// if(mysqli_num_rows($res)>0){
			// 	echo "<div class='row'>";
			// 	while($row = mysqli_fetch_assoc($res)) {
	  //              echo 
	  //              "<div class='col-md-3'><div class='card' style='max-width: 25rem;box-shadow: 0 0 10px 5px #ddd;max-height: 30rem;overflow: auto;padding: 1rem;'>
	  //              		<div class='card-body'>
	  //              			<h3 class='card-title'>"
	  //              				.$row['book_name'].
	  //              			"</h5>
	  //              			<p>";
	  //              			 for ($i=0; $i < $row['rating']; $i++) { 
	  //              					echo "<span class='glyphicon glyphicon-star'></span>";
	  //              				}
	  //              			echo "<p class='card-text'>".$row['synopsis'].
	  //              		"</div>
	  //              	</div></div>";
	  //           }
	  //           echo "<div>";
			// }
			if(mysqli_num_rows($res)>0){
				// echo "<span style='color: #333; font-size: 16px; padding-left: 1rem' id='count'><span>";
				echo "<table id='myTable'>
						<tr class='header' style='font-size: 18px'>
							<th width='20%'>Book Name</th>
							<th width='20%'>Author</th>
							<th width='50%'>Synopsis</th>
							<th width='10%'>Rating</th>
						</tr>";
				while($row = mysqli_fetch_assoc($res)) {
	               echo 
	               "<tr style='background-color:white;font-size: 14px'>
	               		<td>".$row['book_name']."</td>
               			<td>".$row['book_auth']."</td>
               			<td style='text-align: justify'>".$row['synopsis']."</td>
               			<td>(".$row['rating'].")<p>";
	               			 for ($i=0; $i < $row['rating']; $i++) { 
	               					echo "<span class='glyphicon glyphicon-star'></span>";
	               				}
               			echo "</p></td>";
	            }
	            echo "</table>";
			}
			else{
				echo "0 results";
			}
			mysqli_close($con);
		?>
	</div>
</body>
</html>