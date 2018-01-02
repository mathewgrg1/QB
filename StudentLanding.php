
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['userType'])) {
    header('Location:index.php');
  }
date_default_timezone_set('Asia/Kolkata');
$todate = date('Y-m-d', time());
	include("include/connection.php");
  $userID=$_SESSION['userID'];
  $query=mysql_query("select name,courseID from students where userID=".$userID);
  $fetch=mysql_fetch_array($query);
  $courseID=$fetch['courseID'];
  $studentName=$fetch['name'];
  $query=mysql_query("select courseName from courses where courseID=".$courseID);
  $courseName=mysql_fetch_array($query);
  $courseName=$courseName['courseName'];
  $query=mysql_query("select examID, examDate from exams where courseID=".$courseID);
?>
<html lang="en">
<head>
<title>Online Exam</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Innovate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href='css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
<link href="css/team.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<!--//web-fonts-->
<!--//fonts-->
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<!-- js -->
</head>
<body onload="startTime()">

<!-- footer -->

<!-- contact -->
<?php
include('include/header.php');
 ?>

<div class="contact-agileits-w3layouts" id="contact">
<div class="contact-form agile_inner_grids">
	<h3 class="title-w3">Name: <?php echo $studentName ?></h3>
	<h3 class="title-w3">Course: <?php echo $courseName ?></h3>
	<h3 class="title-w3" id="time"></h3>
    <br><br><br>
    <table width="80%">
        
        <tr>
            <th>Sl.</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Take test</th>
        </tr>
					<?php
          $rows=mysql_affected_rows();
          if($rows==0) {
              ?>
        <tr>
            <td colspan="4" rowspan="2"><center>No exams scheduled</center></td>
        </tr>
			
    <?php
          }
          else {
              $i=0;
            while($fetch=mysql_fetch_array($query)) {
                $sName= mysql_query("select subjects.subjectName from subjects inner join exams on subjects.subjectID=exams.subjectID where examID=".$fetch['examID']);
                $subjectName=mysql_fetch_array($sName);
					$i++;		
        ?>   
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $subjectName['subjectName'] ?></td>
            <td><?php echo $fetch['examDate'] ?></td>
            <td>
                <?php
                if($fetch['examDate']==$todate) {
                ?>
                <a href="exam.php?examID=<?php echo $fetch['examID'] ?>">Take test</a>
                <?php 
                }
                ?>
            </td>
        </tr>
                
							<?php
						}
          }

					?>
    </table>

        </div>

			<div class="clearfix"> </div>
</div>
<!-- //contact -->
<!-- Footer -->

<div class="w3l_footer">
<div class="container">
	<div class="col-md-4">
	<h2><a href="index.html"><i class="fa fa-cubes" aria-hidden="true"></i>QB</a></h2>
	</div>

			<div class="clearfix"> </div>
			<div class="copyright-wthree">
				<p>&copy; 2017 QB . All Rights Reserved</p>
			</div>
</div>
</div>
<!-- //Footer -->



<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });

								});
							 </script>
<!-- Flexslider-js for-testimonials -->
<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems:1,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint:480,
											visibleItems: 1
										},
										landscape: {
											changePoint:640,
											visibleItems:1
										},
										tablet: {
											changePoint:768,
											visibleItems: 1
										}
									}
								});

							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!-- //Flexslider-js for-testimonials -->

 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->

</body>
</html>
