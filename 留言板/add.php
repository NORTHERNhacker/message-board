<?php
	if (isset($_COOKIE['user']) == 0)
	{
		echo "You have not logged in!";
	}
	else
	{
		$content = $_POST['content'];
		$username = base64_decode($_COOKIE['user']);

		$servernamesql = "127.0.0.1"; 
		$usernamesql = "root"; 
		$passwordsql = ""; 
		$con = mysqli_connect($servernamesql, $usernamesql, $passwordsql);
		$dbname="information";
		mysqli_select_db($con,$dbname);

		$content = str_replace("<","&lt;",$content);
		$content = str_replace(">","&gt;",$content);
		$content = str_replace("'","&apos;",$content);
		$content = str_replace("\n","<br>",$content);
		$content = str_replace(" ","&nbsp;",$content);

		$content1 = "'".$content."'";
		$username1 = "'".$username."'";

		$add="INSERT INTO content (username,content) VALUES ($username1, $content1)";

		if (mysqli_query($con,$add))
		{
			$_SESSION['success'] =  1;
		}
		else
		{

		}
		mysqli_close($con);

		header("Location: ./my.php");
	}
?>