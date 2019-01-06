<?php
	require_once "connection.php";
	if (isset($_POST['submit'])) {
		$file = $_FILES['file'];


		$id =  $_POST['imgid'];
		$imgpt = $_POST['imgpt'];
		$filename = $_FILES['file']['name'];
		$filetmpname = $_FILES['file']['tmp_name'];
		$filesize = $_FILES['file']['size'];
		$fileerror = $_FILES['file']['error'];
		$filetype = $_FILES['file']['type'];

		$fileext = explode('.',$filename);
		$fileactualext = strtolower(end($fileext));

		$allowed = array('jpg','jpeg','png','gif');

		if(in_array($fileactualext, $allowed)){
			if($fileerror == 0){
				if ($filesize < 1000000) {
					$filenamenew = uniqid('',true).".".$fileactualext;
					$filedestination = '../assets/images/product/'.$filenamenew;
					move_uploaded_file($filetmpname, $filedestination);
					$sql = "UPDATE tbl_products set image_path = '$filedestination' where id = '$id'";
					$result = mysqli_query($con,$sql);
					unlink($imgpt);
					echo "<script type='text/javascript'> alert('Successfully Changed'); document.location = '../controllers/aed-product.php'; </script>";
				}
				else{
					echo "Your file was too big";
				}
			}
			else{
				echo "There was an error uploading your file";
			}
		}
		else{
			echo "You cannot upload files of this type";
		}

	}

?>