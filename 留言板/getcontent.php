<?php
	$servernamesql = "127.0.0.1"; 
	$usernamesql = "root"; 
	$passwordsql = ""; 
	$con = mysqli_connect($servernamesql, $usernamesql, $passwordsql);
	$dbname="information";
	mysqli_select_db($con,$dbname);

	$query = "SELECT * FROM  content";

	$result = mysqli_query($con,$query);
	
	$row=mysqli_num_rows($result);

	function mysql_fetch_all($a)
	 {
		$rows = array();

		while($row=mysqli_fetch_array($a))

		$rows[] = $row;

		return $rows;

	}
	$result_all=mysql_fetch_all($result);

	for ($i=0; $i <= $row - 1; $i ++)
	{
		printf("<table width=\"100%%\">");
		printf("<tr>");
		printf("<td id=\"uname\" > 来自用户: %s</td>",$result_all[$i]['username']);
		printf("</tr>");
		printf("<tr>");
		printf("<td table width=\"15%%\"><td id=\"content\" style=\"word-break:break-all\">内容：%s</td>",$result_all[$i]['content']);
		printf("</tr>");
		printf("<td table width=\"15%%\"></td><td width=\"70%%\"><td><td  id=\"time\"  >%s</td>",$result_all[$i]['time']);
		printf("</tr>");
		printf("</table>");
		echo "<hr style=\"FILTER: alpha(opacity=100,finishopacity=0,style=2)\" width=\"100%\" color=white SIZE=10";
		printf("<br>");
		printf("<br>");		
	}
?>

