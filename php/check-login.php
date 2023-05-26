<?php 
session_start();
include "../db_conn.php";

if (isset($_POST['username']) && isset($_POST['displayName']) && isset($_POST['phone']) 
&& isset($_POST['email']) && isset($_POST['userRoles']) ) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    $username = test_input($_POST['username']);
	$displayName = test_input($_POST['displayName']);
	$phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);
	$userRoles = test_input($_POST['userRoles']);
    
    if (empty($username)) {
		header("Location: ../index.php?error= Username is Required");
	}else if (empty($displayName)) {
		header("Location: ../index.php?error=Name is Required");
	}else if (empty($phone)) {
		header("Location: ../index.php?error=phone is Required");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Email is Required");
	}else {
        
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

        	$row = mysqli_fetch_assoc($result);
        	if ($row['email'] === $email) {
        		$_SESSION['username'] = $row['username'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['email'] = $row['email'];
        		$_SESSION['enabled'] = $row['enabled'];
                $_SESSION['userRoles'] = $row['userRoles'];

        		header("Location: ../home.php");

        	}else {
        		header("Location: ../index.php?error=Incorect Username");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect Username");
        }
    }	
	
}else {
	header("Location: ../index.php");
}

























?>