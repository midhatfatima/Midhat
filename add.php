<?php 
require'connection_db.php';
require'con_songs.php';
//session_start();
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
   <h2>ADD SONGS</h2>
</header>

<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
				</div>

				<h2 class="panel-title">Insert Songs</h2>
			</header>
			<div class="panel-body">
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputTitle">Title</label>
					<div class="col-md-6">
						<input class="form-control" id="inputTitle" type="text" name="Title">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputDescription">Description</label>
					<div class="col-md-6">
						<input class="form-control" id="inputDescription" type="text" name="Description">
					</div>
				</div>
				<div class="form-group">
			     <label class="col-md-3 control-label" for="Uploadfile">Upload Song</label>
			     	<div class="col-md-6">
					      <div class="form-control frm">
						       <input id="Upload" type="file" name="Upload">
						        <div class="inp-btn">upload</div> 
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
	if (isset($_POST["submit"])) {
		$title=$_POST["Title"];
		$description=$_POST["Description"];
		$target_dir = "upload/";
		$target_file=$target_dir.basename($_FILES["Upload"]["name"]);

		$uploadok= 1;
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$error = '';
		
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadok = 0;
		}

		if($fileType != "mp3" ) {
		    echo "Sorry, only mp3 files are allowed.";
		    
		    $uploadok = 0;
		}
		if($_FILES["Upload"]["size"]>50000000)
		{
			echo "sorry your file is too large to upload";
			 $uploadok = 0;
		}

		if ($uploadok == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} 
	else {
		echo $_FILES["Upload"]["tmp_name"];
	
 			if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
 			    echo "your file has been uploaded.";
 				}
 			 else {
 			    echo "error in uploading file";
 			    }
 			    $InsertQ = "INSERT INTO collection (title,description,path,status) VALUES ('$title','$description',
			'$target_file','Enabled')";
			$Query_run=mysqli_query($conc,$InsertQ);
 			}
//here is  the file path file path
//$target_file;
	
	}
?>

			</div>
</section>

<?php
		include 'footer.php';
			
 ?>
