<?php
    session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }else{
    header('Location:login.html');
    exit;
  }

  if(isset($_SESSION['img'])){
    $imgfile = $_SESSION['img'];
  }
  if(isset($_SESSION['mail'])){
    $email = $_SESSION['mail'];
  }
  if(isset($_SESSION['orderid'])){
    $orderid = $_SESSION['orderid'];
  }

    $username = $_SESSION["username"];

    $servername = "localhost";
	$usname = "jirakun";
	$passw = "123";
	$dbname = "cart";
	$tablename = "wdata";
    
    $conn = new mysqli($servername, $usname, $passw,$dbname);
   
    
    function writePic(){
        ///update database 
   	}


    function uploadPic(){
    	$target_dir = "../bilpic/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"] ["name"]); //เอาแต่ชื่อไฟล์
			$uploadOk = 1; //อัพสำเร็จ
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //ตัวเล็ก;

			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false){
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				}
				else{
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

			//check if replace
			if(file_exists($target_file)){
				echo "File is already uploaded.";
				$uploadOk = 0;
			}

			//limit size
			if($_FILES["fileToUpload"]["size"] > 500000){
				echo "Sorry, yout file is too large";
				$uploadOk = 0;
			}

			//check if upload ok
			if($uploadOk == 0){
				echo "sorry, your file was not uploaded";
			}
			else{
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
					echo "The file " . basename($_FILES["fileToUpload"]["name"]) . "has been uploaded.";
				}
				else{
					echo "Sorry,there was an error uploading your file.";
				}
			}
			return $target_file;
	}

	$bilpic = uploadPic();
	$sql = "UPDATE $tablename SET bilpic='$bilpic' WHERE id='$orderid'";

	if($conn->query($sql) === TRUE)
    {
    	echo  "Table $tablename created successfully";
    	header("Location:https://localhost/webfinal/mainpage.php");
    	//echo $imge;
    }

    //$_SESSION['img'] = $imge;
    $conn -> close();
	//header("Location:https://localhost/webfinal/information.php");
?>