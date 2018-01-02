<?PHP
session_start();
include("include/connect.php");
if(!isset($_SESSION['admin']))
	{
		header("Location: ../index.php");
    exit();
	}
$today=date('Y-m-d');	
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
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../images/logo.jpg">
	<!-- end: Favicon -->	
    <script>
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
					<?php include("include/leftlink.php");?>
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
					<a href="home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li>Schedule</li>
			</ul>
			<div class="row-fluid" style="min-height:900px">
			<div class="center_content">  
    		<div class="right_content">            
    	<h2>Scheduled Exams</h2> 

	<?PHP	
	if(isset($_GET['mode']) && ($_GET['mode']=='show'))
					{
				?>                    
         <div class="box-content">      
  		<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">S.No.</th>
            <th scope="col" style="text-align:left">Course Name</th>
            <th scope="col" style="text-align:left">Subject Name</th>
            <th scope="col" style="text-align:left">Date</th>
            <th scope="col" style="text-align:left">Actions</th>
        </tr>
    </thead>
	<tbody>
	<?PHP	
					  $sqlabout=mysql_query("select exams.examID, courses.courseName, subjects.subjectName, exams.qpID, exams.examDate, exams.startTime, exams.endTime from exams inner join courses on exams.courseID=courses.courseID inner join subjects on exams.subjectID=subjects.subjectID" ); 
					  if(mysql_num_rows($sqlabout)==0)
						{
						?>
                		<div class="error_box">
			        		No Record To Display!!
     					</div>
                      <?PHP } ?>
                      <?PHP
					$i=1;
					while($resultabout=mysql_fetch_array($sqlabout))
					{
					 ?>
                      <tr bgcolor="#E1E1E1">
                        <td><?PHP echo $i.'.'; ?> </td>
                        <td style="text-align:left"><?PHP echo $resultabout['courseName'];  ?></td>
                          <td style="text-align:left"><?PHP echo $resultabout['subjectName'];  ?></td>
                          <td style="text-align:left"><?PHP echo $resultabout['examDate'];  ?></td>
                        <td style="text-align:left">
						<a class="btn btn-info" href="schedule.php?mode=view&amp;id=<?php echo $resultabout['examID']; ?>">View
						<i class="halflings-icon white edit"></i>  
									</a>	</td>
						 <td style="text-align:left">
						<a class="btn btn-info" href="schedule.php?mode=del&amp;id=<?php echo $resultabout['examID']; ?>">Delete
						<i class="halflings-icon white edit"></i>  
									</a>	</td>				
									
                      </tr>
                      <?PHP
					  $i++;
					  }					  
					  ?>	
	</tbody>
       </table>
	   </div>  
	      <?PHP
				}
				?>
    </div>
	<div class="left_content">
		<?php
				if(isset($_GET['mode']) && ($_GET['mode']=='del'))
				{
					mysql_query("delete from exams where examID=" . $_GET['id']);
					header("Location: schedule.php?mode=show");
                    exit();
				}
					else if(isset($_GET['mode']) && ($_GET['mode']=='view'))
					{
						$aboutar=mysql_query("select exams.examID, courses.courseName, subjects.subjectName, exams.qpID, exams.examDate, exams.startTime, exams.endTime from exams inner join courses on exams.courseID=courses.courseID inner join subjects on exams.subjectID=subjects.subjectID where examID=" . $_GET['id']);
						$about=mysql_fetch_array($aboutar);
				?>	
				<div class="box-content">
					<form action="schedule.php?action=update&amp;id=<?php echo $about['examID']; ?>" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();" method="post">
					<fieldset>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Course Name </label>
					<div class="controls"><input name="title" readonly="ture" type="text" class="button" size="60" value="<?PHP echo $about['courseName'] ?>" />
					</div>
					</div>
                    
                        <div class="control-group">
					<label class="control-label" for="typeahead">Subject Name </label>
					<div class="controls"><input name="title" readonly="ture" type="text" class="button" size="60" value="<?PHP echo $about['subjectName'] ?>" />
					</div>
					</div>
					
                    <div class="control-group">
					<label class="control-label" for="typeahead">Question Paper ID </label>
					<div class="controls"><a href=""><?php echo $about['qpID'] ?></a>
					</div>
					</div>
                        
					<div class="control-group">
					<label class="control-label" for="typeahead">Date </label>
					<div class="controls"><input name="examDate" type="date" class="button" size="60" value="<?PHP echo $about['examDate']; ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="typeahead">Start time </label>
					<div class="controls"><input name="startTime" type="time" class="button" size="60" value="<?PHP echo $about['startTime']; ?>" />
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">End time </label>
					<div class="controls"><input name="endTime" type="time" class="button" size="60" value="<?PHP echo $about['endTime']; ?>" />
					</div>
					</div>
                        
                    <div class="control-group">
					<label class="control-label" for="typeahead"></label>
					<div class="controls"><input type="submit" class="btn btn-info" value="Update" onclick="return formVal();">
					</div>
					</div>
					</fieldset>
                  </form>
			  <?PHP	
				}
        else if(isset($_GET['action']) && ($_GET['action']=='update')) {
            $examDate = $_POST['examDate'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            mysql_query("update exams set examDate='".$examDate."', startTime='".$startTime."','".$endTime."' where examID=".$_GET['id']);
            ?>
                    <script>
                    alert("Exam updated");
                        window.location="schedule.php?mode=show";
                    </script>
                    <?php
        }
				?>
			
	</div>
    <div class="clear"></div>
    </div>

				<div class="clearfix"></div>	
			</div><!--/row-->
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
            <span style="text-align:left;float:left">&copy; <a href="#" target="_blank">QB 2017</a></span>
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
    </div>
</body>

</html>
