<?php 
require'connection_db.php';
require'con_songs.php';
include 'header.php';
if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$songquery4= "UPDATE collection SET status='Disabled' WHERE id='$id'";
		mysqli_query($conc,$songquery4);
	}
?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
<header class="page-header">
   <h2>Dashboard</h2>
</header>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
				</div>

				<h2 class="panel-title">Songs</h2>
			</header>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="mb-md">
							<a href="add.php">
							<button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
							</a>
						</div>
					</div>
				</div>
			</div>
<div class="panel-body">
		<div class="table-responsive">
			<table class="table mb-none">
				<thead>
					<tr>
						<th>#</th>
						<th>Song Title</th>
						<th>Description</th>
						<th></th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
<?php
	$songquery1= "SELECT * FROM collection WHERE status='Enabled'";
	$songresult1= mysqli_query($conc,$songquery1);
	$no = 1;
	while ($row=mysqli_fetch_assoc($songresult1)) {
	
?>					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><a class="mb-xs mt-xs mr-xs modal-basic" href="#modalBasic-<?=$no?>">listen</a>/<a href="">download</a></td>
	<div id="modalBasic-<?=$no?>" class="modal-block mfp-hide">
		<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title"><?php echo $row['title'];?> </h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<audio controls>
				  <source src="<?php echo $row['path']; ?> " type="audio/mpeg">
				Your browser does not support the audio element.
				</audio>

			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-default modal-dismiss">Close</button>
				</div>
			</div>
		</footer>
	</section>
	</div>
						<td class="actions">
							<a href="update.php?id=<?=$row['id'];?>" title="update"><i class="fa fa-pencil"></i></a>
							<a href="dashboard.php?id=<?=$row['id'];?>" class="delete-row" title="delete"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					<?php $no++; } ?>

				</tbody>
			</table>
		</div>
	</div>

		</section>
	</div>
</div>

<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>			


<?php
		include 'footer.php';
			
 ?>