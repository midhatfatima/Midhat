<?php 
require'connection_db.php';
require'con_songs.php';
//session_start();
ob_start();
include 'header.php';

?>
<html>
<head>
<style type="text/css">
label
{
	font-size: 20px;
	color: black;
}
 .frm >input
 {
  	display: block;
     width: 130px;
     height: 27px;
     opacity: 0;
     overflow: hidden;
     margin: 0px 74%;
 }
 .inp-btn{
  width: 28%;
  padding: 5px 0px;
  border-left: 1px solid #ccc;
  margin-top: -32px;
  margin-left: 75%;
  text-align: center;
  display: block;
 }
</style>
</head>
<body>

<header class="page-header">
   <h2>UPDATE SONG</h2>
</header>

<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
				</div>

				<h2 class="panel-title">Update</h2>
			</header>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data">
<?php
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$Songqyery2= "SELECT * FROM collection WHERE id='$id'";
					$Songresult2= mysqli_query($conc,$Songqyery2);
					$result2=mysqli_fetch_assoc($Songresult2);
				}
?>
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputTitle">Title</label>
					<div class="col-md-6">
						<input class="form-control" id="inputTitle" type="text" value=" <?php echo 
						$result2['title']; ?> " name="Title">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputDescription">Description</label>
					<div class="col-md-6">
						<input class="form-control" id="inputDescription" type="text" value= " <?php echo $result2['description']; ?>"= name="Description">
					</div>
				</div>
				<div class="form-group">
			     <label class="col-md-3 control-label" for="Updatefile">Update Song</label>
			     	<div class="col-md-6">
					      <div class="form-control frm">
						       <input id="Updatesong" type="file" placeholder=" <?php echo $result2['path']; ?> " name="Update">
						       <div class="inp-btn">update</div>
					      </div>
				     </div>
			    </div>
			    <div class="form-group">
					<div class=" col-md-3 col-md-offset-6 text-right">
						<!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs">submit</button> -->
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				

			
			</form>



<?php
if(isset($_POST['submit']))
{
	$Updtitle= $_POST['Title'];
	$Upddescription= $_POST['Description'];
	$target_dir = "upload/";

	if (empty(basename($_FILES["Update"]["name"]))) {
		$target_file=$result2['path'];
	}
	else
			$target_file=$target_dir.basename($_FILES["Update"]["name"]);
		$updateok= 1;
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$updateok = 0;
		}

		if($fileType != "mp3" ) {
		    echo "Sorry, only mp3 files are allowed.";
		    $updateok = 0;
		}

		if ($updateok == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} 
	// else {
 // 			if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
 // 			    echo "The file ". basename( $_FILES["Upload"]["name"]). " has been uploaded.";
 // 				}
 // 			 else {
 // 			    echo "Sorry, there was an error uploading your file.";
 // 			    }
 // 			}
//here is  the file path file path
//$target_file;
	$Songqyery3 = "UPDATE collection SET title='$Updtitle',description='$Upddescription',path='$target_file' WHERE id='$id'";
	$Songresult3=mysqli_query($conc,$Songqyery3);
	if ($Songresult3) {
		header('location:dashboard.php');

	}
	}

		include 'footer.php';
			
 ?>