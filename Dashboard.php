<?php   include "db.php";    ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<script src="jquery-3.2.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script !src="">
        function Deleteqry(id)
        {
            if(confirm("Are you sure you want to delete this row?")==true)
                window.location="yourpagename.php?del="+id;
            return false;
        }
    </script>

</head>
<body>
<div class="heading">
	<a href=""><p>Visit Blog</p></a>
</div>
<div class="container-fluid">
	<div class="main" id="dashboard">
		<div class="row">
			<div class="col-sm-2">
				<ul id="side-menu" class="nav nav-pills nav-stacked">
					<li class="active"><a href="Dashboard.php">
					<span = class="glyphicon glyphicon-th"></span>
					 &nbsp;Dashboard</a></li>

				
					
					<li><a href="index.php">
					<span = class="glyphicon glyphicon-equalizer"></span>
					&nbsp;Live </a></li>
                    <li><a href="allpost.php">
					<span = class="glyphicon glyphicon-equalizer"></span>
					&nbsp;Map Garbage </a></li>
					<li><a href="logout.php">
					<span = class="glyphicon glyphicon-log-out"></span>
					&nbsp;Lagout</a></li>
				</ul>
			</div>
			<div class="col-xs-10">
				<div>
					<h1>Dashboard</h1>

					<div class="table-responsive">

							<?php
							$sql = "SELECT * FROM gpostnonapproved ";
							$exec = mysqli_query($connection,$sql);
							$postNo = 1;
							if(mysqli_num_rows($exec) < 1	) {
								?>
									<p class="lead">You Have 0 Post For The Moment</p>

								<?php
							}else{ ?>
							<table class="table table-hover">
							<tr>
								<th>Post No.</th>

								<th>Location</th>
								<th>Author</th>

								<th>Feature Image</th>
								<th>Post</th>
								<th>Action</th>
								<th>Details</th>
							</tr>
							<?php
								while ($post = mysqli_fetch_assoc($exec)) {
									$post_id = $post['p_id'];
									$location = $post['lat'].$post['lng'];
									$description = $post['description'];
									$author = "Admin";
									$image = $post['img'];
									$lat = (float)$post['lat'];
									$lng = (float)$post['lng'];
									?>
									<tr>
									<td><?php echo $post_id; ?></td>

									<td><?php
									if(strlen($location) > 20 ) {
										echo substr($location,0,20) . '...';
									}else {
										echo $location;
									}

									?></td>
									<td><?php echo $author; ?></td>

									<td><?php echo "<img class='img-responsive' src='$image' width='100px' height='150px'>"; ?></td>
									<td><?php echo 'Ongoing'; ?></td>
                                        <td><?php echo "<a href='delete.php?post_id=$post_id'>Delete</a> | <a href='approve.php?post_id=$post_id&lat=$lat&lng=$lng&dis=$description&img=$image'>Approve</a>"; ?></td>

									</tr>
									<?php
									$postNo++;
								}
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row navbar-inverse" id="footer">
	</div>
</div>

<script type="text/javascript" src="jquery.js"></script>
</body>
</html>