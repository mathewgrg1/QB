<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index-2.html"><span> 
				
				 </span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
				
					<ul class="nav pull-right">
						
						
						<!-- start: Message Dropdown -->
						
						<!-- end: Message Dropdown -->
						
						<!-- start: User Dropdown -->
						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Hello <?php echo $_SESSION['admin']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
							<?php if(($_SESSION['designation'])=='admin')
			{
			?>	
							
								<li><a href="user.php?mode=show"><i class="halflings-icon off"></i> New User</a></li>
							<?php 	} ?>
								<li><a href="change_password1.php"><i class="halflings-icon user"></i> Change Password</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
<body>
</body>
</html>