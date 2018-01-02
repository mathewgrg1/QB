<?PHP
ob_start();
session_start();
include("include/connect.php");
	if(isset($_SESSION['admin']))
	{
		header("Location:home.php");
	}
else
{
$error='';
$offset=5*60*60+1800;
$dateFormat="d/m/Y H:i";
$timeNdate=gmdate($dateFormat, time()+$offset); 
date_default_timezone_set("Asia/Kolkata");
$today=date('Y-m-d ');


if (isset($_POST['user']) &&  ($_POST['user']!=''))
{
	$query=mysql_query("select * from team_member where id='" .$_POST['user']. "' and adminPass='" .$_POST['pass'] ."'");
	$rows = mysql_num_rows($query);
	if($rows==0)
		{
			$error = 'Login Id or Password is incorrect !!';
		}
	else
		{ 
		$fetch=mysql_fetch_array($query);
		if($fetch['adminPass']==$_POST['pass'])
			{	
				$_SESSION['admin'] = $fetch['name'];
				$_SESSION['adminid'] = $fetch['id'];
		header('Location:home.php');
		$sql=mysql_query("insert into logbook (date,userid,category,task) values('".$today."','".$_SESSION['adminid']."','login','".$_SESSION['admin']."')");
			}
		else
			{
				$error ='Login Id or Password is incorrect !!';
			}		
		}
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN PANEL | Stepping Stones</title>

<style>
body {
        background: #000;
}
		
h4 { color: #FFF; font-size:22px; font-weight:normal; margin:0px}
#input {
		background: none repeat scroll 0 0 #fff;
		border: 0 none;
		color: #7F7F7F;
		float: left;
		height: 20px;
		margin: 0;
		padding: 10px;
		transition: background 0.3s ease-in-out 0s;
		width: 280px;
		outline:none
	}
	#input1 {
		background: none repeat scroll 0 0 #fff;
		border: 0 none;
		color: #7F7F7F;
		float: left;
		height: 20px;
		margin: 0;
		padding: 10px;
		transition: background 0.3s ease-in-out 0s;
		width: 240px;
		outline:none
	}
	#button {
		background: url(log.png) no-repeat scroll center center #FC108C;
		cursor: pointer;
		height: 40px;
		text-indent: -99999em;
		transition: background 0.3s ease-in-out 0s;
		width: 40px;
		border: 2px solid #fff;
		outline:none
	}
	.logdic{width:45%; height:auto; padding:5%; margin:0 auto; margin-top:10%;}
	.leftpart{width:70%; float:left;}
	.leftpart1{width:30%; float:left;}
	.namess{font-size:22px; color:#FFF; line-height:30px; font-family:Arial, Helvetica, sans-serif}
	#wid{width:260px}
	
</style>

</head>
<body>
<div class="logdic">
<div style="width:100%;text-align:center; padding:15px"><h4>Admin Login</h4></div>
<form method="post">
<div class="leftpart1"><span class="namess">Username</span></div>
<div class="leftpart"><input type="text" name="user" id="input" placeholder="USERNAME"></div>
<div style="width:100%; height:20px; clear:both"></div>
<div class="leftpart1"><span class="namess">Password</span></div>
<div class="leftpart"><input type="password" name="pass" id="input1" placeholder="PASSWORD">
<button type="submit" id="button">Submit</button></div>
</form>
</div>
</body>
</html>