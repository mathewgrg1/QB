<?php
if(isset($_SESSION['userType']))
  $name=$_SESSION['user'];
?>
<header style="background-color:#1b1b1b">

  <div class="header-bottom-agileits">
  <div class="w3-logo">
      <h1><a href="index.php"><i class="fa fa-cubes" aria-hidden="true"></i>QB</a></h1>
    </div>
  <!-- navigation -->
  <nav class="navbar navbar-default shift">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a class="scroll">HI <?php echo $name ?></a></li>
      <li><a href="logout_exec.php">Logout</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->

  </nav>
   <div class="w3ls_search">
      <div class="cd-main-header">
        <ul class="cd-header-buttons">
          <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
        </ul> <!-- cd-header-buttons -->
      </div>
      <div id="cd-search" class="cd-search">
        <form action="#" method="post">
          <input name="Search" type="search" placeholder="Click enter after typing...">
        </form>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
<!-- //navigation -->
</header>
