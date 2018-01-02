
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
	include("include/connection.php");
    session_start();
    if(!isset($_SESSION['userType'])) {
        header('Location:index.php');
    }
$key="key textkey text";
include 'include/AES.php';
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
    <!--AES decryption function is in this file -->
<script type="text/javascript" src="include/aes.js">
    </script>
    <!--AES decryption function is in this file -->

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
	<?php
	include('include/header.php');
	 ?>
<!-- footer -->

<!-- contact -->
<?php
	$examID=$_GET['examID'];
	$query=mysql_query("select * from exams where examID=".$examID);
	$fetchExam=mysql_fetch_array($query);
	$subject=mysql_fetch_array(mysql_query("select subjectName from subjects where subjectID=".$fetchExam['subjectID']));
	$course=mysql_fetch_array(mysql_query("select courseName from courses where courseID=".$fetchExam['courseID']));
	$qpID=mysql_fetch_array(mysql_query("select qpID from exams where examID=".$examID));
	$qpID=$qpID['qpID'];
 ?>
<div class="contact-agileits-w3layouts" id="contact">
<div class="contact-form agile_inner_grids">
	<h5 class="title-w3">Course: <?php echo $course['courseName'] ?></h5>
	<h5 class="title-w3">Subject: <?php echo $subject['subjectName'] ?></h5>
    <h5 class="title-w3">Exam start time: <?php echo $fetchExam['startTime'] ?></h5>
    <h5 class="title-w3">Exam end time: <?php echo $fetchExam['endTime'] ?></h5>
				<form action="exam.php?examID=<?php echo $examID ?>&action=submit" method="post">
					<?php
					$i=0;
        
    
						$query=mysql_query("select questions.question as ques, questionpapers.questionNo as qNo from questionpapers INNER JOIN questions ON questionpapers.questionID=questions.questionID where questionpapers.qpID=".$qpID);
						while($fetch=mysql_fetch_array($query)) {
							$i++;
                            //Test
    include_once("AES.php");
    date_default_timezone_set('Asia/Kolkata');
    $todate = date('Y-m-d', time());
    $dateTime = new DateTime($fetchExam['startTime']);
    
    if($todate==$fetchExam['examDate']) {
        if($dateTime->diff(new DateTime)->format('%R') == '+') {
        ?>
							<div class="styled-input textarea-grid">
								<textarea name="qn<?php echo $i?>" required></textarea>
								<label><?php echo $i.". ".$fetch['ques']?></label>
								<span></span>
							</div>
							<?php
    }
        else {
                                $imputText=$fetch['ques'];
                                $imputKey=$key;
                                $blockSize = 256;
                                $aes = new AES($imputText, $imputKey, $blockSize);
                                $enc = $aes->encrypt();
                                ?>
							<div class="styled-input textarea-grid">
								<textarea name="qn<?php echo $i?>" required></textarea>
								<label><?php echo $i.". ".$enc ?></label>
								<span></span>
							</div>
							<?php
                            }
    }
                            else {
                                $imputText=$fetch['ques'];
                                $imputKey=$key;
                                $blockSize = 256;
                                $aes = new AES($imputText, $imputKey, $blockSize);
                                $enc = $aes->encrypt();
                                ?>
							<div class="styled-input textarea-grid">
								<textarea name="qn<?php echo $i?>" required></textarea>
								<label><?php echo $i.". ".$enc ?></label>
								<span></span>
							</div>
							<?php
                            }
    //Test ends
							
						}
					?>

					<input type="submit" value="Submit">
				</form>
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
<?php
	$req=isset($_REQUEST['action']) ? $_REQUEST['action'] :'';
	if($req=='submit') {
			$j=1;
			while($j<=$i) {
				mysql_query("insert into answers(qpID,questionNo,answer) values(".$qpID.",".$j.",'".$_POST['qn'.$j]."')");
				$j++;
		}
	}
 ?>