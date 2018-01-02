<?PHP
session_start();
include("include/connect.php");

if(!isset($_SESSION['admin']))
	{
		header("Location: ../index.php");
	}
$today=date('Y-m-d');	

$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';

if($req=='add')
{
$fetch=mysql_fetch_array(mysql_query("select max(userID) as max from students"));
    $next=$fetch['max']+1;
$sql=mysql_query("insert into students(name,courseID,userID) values('".$_POST['name']."','".$_POST['courseID']."',".$next.")");
    $fetch=mysql_fetch_array(mysql_query("select max(studID) as max from students"));
    $next=$fetch['max'];
$fetch=mysql_fetch_array(mysql_query("select userID, studID from students where studID=".$next));
mysql_query("insert into users(username, password, userType) values(".$fetch['studID'].",".$fetch['studID'].",1)");
		header('Location: students.php?msg=added');
}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='edit')
{
mysql_query("update questions set question='".$_POST['question']."',marks='".$_POST['marks']."' where questionID=".$_GET['id']);
header('Location:students.php?msg=edited');
	}
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
if($req=='delete')
{
		mysql_query("delete from questions where questionID=".$_GET['id']);
		header('Location:students.php?msg=deleted');
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
    var fillStudents = function() {
        var courseID = document.getElementById('courseSelect').selectedIndex;
        <?php
        if(isset($_GET['mode']) && ($_GET['mode']=='add')) {
            ?>
            window.location = 'students.php?courseID='+courseID+'&mode=add';
        <?php
        }
        else {
            ?>
        window.location = 'students.php?mode=show&courseID='+courseID ;
        <?php
        }
        ?>
    }
    var showTable = function() {
        <?php
        if(isset($_GET['mode']) && ($_GET['mode']=='add')) {
            ?>
        document.getElementById('courseField').value= document.getElementById('courseSelect').value;
        document.getElementById('subjectField').value= document.getElementById('subjectSelect').value;
        <?php
        }
        else {
            ?>
        var courseID = document.getElementById('courseSelect').value;
        var subjectID = document.getElementById('subjectSelect').value;
        window.location = 'questions.php?mode=show&courseID='+courseID+"&subjectID="+subjectID;
        <?php
        }
        ?>
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
					<a href="home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="team.php">Students </a></li>
			</ul>
			<div class="row-fluid" style="min-height:900px">
			<div class="center_content">  
    		<div class="right_content">            
    	<h2>Students list</h2> 
<?PHP
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
	if($req=='edited')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Edited Successfully
     </div>
<?PHP
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
if($req=='deleted')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Deleted Successfully
     </div>
<?PHP
}
$req=isset($_GET['msg']) ? $_GET['msg'] :'';
	if($req=='added')
{
?>
	 <div class="valid_box" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
        Record Added Successfully
     </div>
<?PHP
}
?>
                <table>
             <tr>
				<td>Course Name</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><select class="text_box2" name="courseName" id="courseSelect" onchange="fillStudents();">
				<option value="0">--Any--</option>
				<?php
					$sql=mysql_query("select * from courses");
					while ($fetch=mysql_fetch_array($sql)) {
                        if(isset($_GET['courseID']) && ($_GET['courseID']==$fetch['courseID']))
                            $s="selected";
                        else
                            $s="";
				?>
			<option value="<?php echo $fetch['courseID']; ?>" <?php echo $s ?>><?php echo $fetch['courseName']; ?></option>
			<?php
		}
		?>
	</select></td>
				</tr>
                    
             </table>
	<?PHP	
	if(isset($_GET['mode']) && ($_GET['mode']=='show'))
					{
				?>                    
         <div class="box-content">      
             
  		<table class="table table-striped table-bordered bootstrap-datatable datatable">
   	<thead>
    	<tr>
            <th scope="col" style="text-align:left">Sl.No.</th>
            <th scope="col" style="text-align:left">Student ID</th>
            <th scope="col" style="text-align:left">Name</th>
            <th scope="col" style="text-align:left">Actions</th>
        </tr>
    </thead>
	<tbody>
	<?PHP	
					  $sqlabout=mysql_query("select studID, name from students where courseID=".$_GET['courseID']); 
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
                        <td style="text-align:left"><?PHP echo $resultabout['studID'];  ?></td>
                          <td style="text-align:left"><?PHP echo $resultabout['name'];  ?></td>
                        <td style="text-align:left">
						<a class="btn btn-info" href="students.php?mode=edit&amp;id=<?php echo $resultabout['questionID']; ?>">Edit
						<i class="halflings-icon white edit"></i>  
									</a>					
						<a class="btn btn-danger" href="students.php?action=delete&amp;id=<?php echo $resultabout['questionID']; ?>" onClick="return confirm('Are you sure you want to delete this data?');">Delete
		<i class="halflings-icon white trash"></i>  
									</a>			
						</td>
                      </tr>
                      <?PHP
					  $i++;
					  }					  
					  ?>	
	</tbody>
	<tfoot>
    	<tr>
        	<td class="rounded-foot-left"></td>
            <td class="rounded-foot-right"><center><a class="btn btn-info" href="students.php?mode=add">Add new student<i class="halflings-icon white trash"></i></a></center></td>
        </tr>
    </tfoot>
       </table>
	   </div>  
	      <?PHP
				}
				?>
    </div>
	<div class="left_content">
				<?PHP	
					if(isset($_GET['mode']) && ($_GET['mode']=='add'))
					{
				?>	
				<div class="box-content">
					<fieldset>
                        <form action="students.php?action=add" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1">
					<input type="hidden" id="courseField" name="course">
                            <input type="hidden" name="subject" id="subjectField">
				  <div class="control-group">
					<label class="control-label" for="typeahead">Enter Name: </label>
					<div class="controls">
                        <input name="name" type="text" class="button" size="60" placeholder="Enter name" />
					</div>
                      <input type="hidden" name="courseID" value="<?php echo $_GET['courseID'] ?>">
                            </div>
					
					<div class="clear"></div>
					<div>
                      <div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save </button>
					</div>
					</div>
                  </form>
				</fieldset>
                </div>
			<?PHP	
				}
				?> 
		</div>
	<div class="left_content">
				<?PHP	
					if(isset($_GET['mode']) && ($_GET['mode']=='edit'))
					{
				?>	
				<div class="box-content">
                    <h3>Edit Question</h3>
					<form action="questions.php?action=edit&id=<?PHP echo $_GET['id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1">
					<fieldset>
				  <?PHP
				  $about=mysql_query("select subjects.subjectName, questions.question, questions.marks from questions inner join subjects on questions.subjectID=subjects.subjectID where questionID=" . $_GET['id']);
				  $about_data=mysql_fetch_array($about);
				  ?>
				  <div class="control-group">
					<label class="control-label" for="typeahead">Subject: </label>
					<div class="controls"><input name="title" type="text" class="button" size="60" value="<?PHP echo $about_data['subjectName']; ?>" readonly/>
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="typeahead">Question: </label>
					<div class="controls">
                        <textarea name="question"><?PHP echo $about_data['question']; ?></textarea>
					</div>
					</div>
                        <div class="control-group">
					<label class="control-label" for="typeahead">Marks: </label>
					<div class="controls"><input name="marks" type="text" class="button" size="60" value="<?PHP echo $about_data['marks']; ?>"/>
					</div>
					</div>
	
					
					<div class="clear"></div>
          <div>
                      <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							</div>
					</div>
					</fieldset>
                  </form>
                </div>
			  <?PHP	
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
