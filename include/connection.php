<?PHP
	$host="localhost";
	$user="root";
	$password="";
	$con=mysql_connect($host,$user,$password);
	mysql_select_db("qb",$con);
	if(!$con)
		{
		 die('Could not connect: ' . mysql_error());
		}
?>
