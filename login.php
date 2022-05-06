<?php
ob_start(); 
if(isset($_POST['submit'])){ 

  if(!empty($_POST['user']) && !empty($_POST['pass'])) { 

    $u=$_POST['user']; 

    $p=$_POST['pass']; 

      $link=new mysqli("localhost","root","","student_database");

		if ($link->connect_error) {

			die("Connection failed: " . $link->connect_error);
		}

		$sql="SELECT * FROM student_login WHERE email='$u' and password='$p'"; 

		$res=$link->query($sql);

		$numrows=mysqli_num_rows($res); 

		echo $numrows;

	if($numrows==1)

	{ 

		session_start(); 

		$_SESSION['sess_user']=$u; 

      /* Redirect browser */ 

	header("Location: Student_Profile_Nav_Bars.php"); 
     		

	}

   else { 

    echo "Invalid username or password!"; 

    }  
} 
else { 

    echo "All fields are required!"; 

}  
}

?>  