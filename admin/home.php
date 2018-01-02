<?PHP
session_start();
include("include/connect.php");

	if(!isset($_SESSION['admin']))
	{
		header("Location: ../index.php");
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin - QB</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Lukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../images/logo.jpg">
	<!-- end: Favicon -->
    <script>
    var fillSubjects = function() {
        var courseID = document.getElementById('courseSelect').selectedIndex;
        window.location = 'home.php?course='+courseID ;
    }
    var formVal = function() {
        var examDate= document.getElementById('examDate').value;
        var q = new Date();
        var m = q.getMonth();
        var d = q.getDate();
        var y = q.getFullYear();

        var date = new Date(y,m,d);

        mydate=new Date(examDate);
        console.log(date);
        console.log(mydate);

        if(date>mydate)
        {
            alert("Given date is already over. Please enter a future date.");
            return false;
        }
        return true;
        
    }
    </script>



</head>

<body>
		<!-- start: Header -->
	<?php include("include/header.php"); ?>
	<!-- start: Header -->
		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<?php include("include/leftlink.php"); ?>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">

				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="home.php">Create Exam</a>

				</li>

			</ul>
			
			<div class="row-fluid">
			
				<form action="home.php?action=createExam" method="post">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
				<td>Course Name</td>
				<td><select class="text_box2" name="courseName" id="courseSelect" onchange="fillSubjects();">
				<option value="0">--Any--</option>
				<?php
					$sql=mysql_query("select * from courses");
					while ($fetch=mysql_fetch_array($sql)) {
                        if(isset($_GET['course']) && ($_GET['course']==$fetch['courseID']))
                            $s="selected";
                        else
                            $s="";
				?>
			<option value="<?php echo $fetch['courseID']; ?>" <?php echo $s?>><?php echo $fetch['courseName']; ?></option>
			<?php
		}
		?>
	</select></td>
				</tr>
                    <tr>
				<td>Subject Name</td>
				<td><select class="text_box2" name="subjectName">
				<option value="0">--Any--</option>
				<?php
                    if(isset($_GET['course'])) {
                        
					$sql=mysql_query("select * from subjects where courseID=".$_GET['course']);
					while ($fetch=mysql_fetch_array($sql)) {
				?>
			<option value="<?php echo $fetch['subjectID']; ?>"><?php echo $fetch['subjectName']; ?></option>
			<?php
		}
                    }
		?>
	</select></td>
				</tr>
				<tr>
				<td>Exam date</td>
				<td><input type="date" name="examDate" id="examDate"></td>
				</tr>
				<tr>
					<td>From time</td>
					<td><input type="time" name="fromTime"></td>
				</tr>
                    <tr>
					<td>To time</td>
					<td><input type="time" name="toTime"></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-info" value="Create" onclick="return formVal();"></td>
					<td></td>				
				</tr>
				</table>
				</form>
			</div>
			
	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"></button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; <a href="#" target="_blank">QB</a> 2017</span>

		</p>

	</footer>

	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>

		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

		<script src="js/jquery.ui.touch-punch.js"></script>

		<script src="js/modernizr.js"></script>

		<script src="js/bootstrap.min.js"></script>

		<script src="js/jquery.cookie.js"></script>

		<script src='js/fullcalendar.min.js'></script>

		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>

		<script src="js/jquery.chosen.min.js"></script>

		<script src="js/jquery.uniform.min.js"></script>

		<script src="js/jquery.cleditor.min.js"></script>

		<script src="js/jquery.noty.js"></script>

		<script src="js/jquery.elfinder.min.js"></script>

		<script src="js/jquery.raty.min.js"></script>

		<script src="js/jquery.iphone.toggle.js"></script>

		<script src="js/jquery.uploadify-3.1.min.js"></script>

		<script src="js/jquery.gritter.min.js"></script>

		<script src="js/jquery.imagesloaded.js"></script>

		<script src="js/jquery.masonry.min.js"></script>

		<script src="js/jquery.knob.modified.js"></script>

		<script src="js/jquery.sparkline.min.js"></script>

		<script src="js/counter.js"></script>

		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
<?php
if(isset($_GET['action']) && ($_GET['action']=='createExam')) {
    $courseID = $_POST['courseName'];
    $subjectID = $_POST['subjectName'];
    $date = $_POST['examDate'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $qArr=range(1,20);
    $i=0;
    $rand_keys = array_rand($qArr, 10);
    $fetch=mysql_fetch_array(mysql_query("select max(qpID) as max from questionpapers"));
    $next=$fetch['max']+1;
    for($i=0;$i<10;$i++) {
        mysql_query("insert into questionpapers(qpID,questionNo,questionID) values(".$next.",".($i+1).",".$rand_keys[$i].")");
    }
    mysql_query("insert into exams(courseID,subjectID,qpID,examDate,startTime,endTime) values(".$courseID.",".$subjectID.",".$next.",'".$date."','".$fromTime."','".$toTime."')");
    ?>
    <script>
    alert("Exam created successfully");
    </script>
<?php
}
?>
