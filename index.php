<?php
session_start();
    //Write code to check session
 include_once ("phplib/dataservice.php");
 if(isset($_REQUEST['ins']))
{
    if($_REQUEST['ins']=="succ")
    {
        echo "<script> alert('Successfully Registered. Once Admin will approve than you will be able to login.');</script>";
    }
    else if($_REQUEST['ins']=="file")
    {
        echo "extension not allowed, please choose a JPEG or PNG file.";
    }
    else if($_REQUEST['ins']=="size")
    {
        echo "File size must be less than 2 MB";
    }
    else 
    {
        echo "Problem in uploading.";
    }       
 }
 if(isset($_REQUEST['login']))
{
    if($_REQUEST['login']=="fail")
    {
        echo "<script> alert('Your Account is not verified by admin.Contact with admin');</script>";
    }
        
 }
 ?>
<html>
<head>
<title>
	Alumni Portal : Version 1.0
</title>
<link  rel="stylesheet" href="style.css">

<style>
body {
  padding-top: 150px;
  margin:0;
}

</style>
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function() {
  var scrollTop = 0;
  $(window).scroll(function() {
    scrollTop = $(window).scrollTop();
    $(".counter").html(scrollTop);

    if (scrollTop >= 100) {
      $("#global-nav").addClass("scrolled-nav");
	  	    $("#global-nav").css("background" , "#7f8c8d");

    } else if (scrollTop < 100) {
      $("#global-nav").removeClass("scrolled-nav");
	  $("#global-nav").css("background" , "#324c5f");
    }
  });
 $("#notification-hide").click(function(){
        $("#notification").remove();
    });
});

</script>
</head>
<body >
<header>
	
<div class="nav-bar nav" id="global-nav">
<div class="logo">
<img src="test5.png" class="logo-image">
</div>
<div class="nav-menu">
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">contact</a></li>
<li class="dropdown"><a href="#" class="dropdown-btn">Gallery</a>
	<div class="dropdown-menu">
		<a href="#">home1</a>
		<a href="#">home2</a>
		<a href="#">home3</a>
	</div>
</li>
<li><a href="#">Service</a></li>
<li><a href="#">Login</a></li>
</ul>
</div>
</div>

<div class="video-stream container-boxs" >
			<div class="video-wrap">
				<video src="video/Typing_light_01_Videvo.mov" autoplay="true" loop="true" ></video>
			</div>
			<div class="header-overlay"></div>
			<div class="header-content">
					<h1>Alumni Portal</h1>
					<p>
					An initiative to make students connected even after they graduated........
					</p>
				<a href="#" class="btn">Read More</a>
			</div>
			</div>
</header>
<div class="hero-section">
  <div class="hero-text">
		<div class="form">
			<div class="registerBox">
		<img src="test5.png" class="user">
		<h2>Register Here</h2>
		
		<form role="form" action="server.php" class="aviform" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter Name" required/>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input class="form-control" name="fname" placeholder="Enter Father Name" required/>
                    </div>
                    <div class="form-group">
                        <label>Batch</label>
                        <input class="form-control" name="batch" placeholder="Enter Batch Year (2010-2013)" required/>
                    </div>
                    <div class="form-group">
                        <label>Email Id</label>
                        <input class="form-control" name="email" placeholder="Enter Email" required/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="Enter Phone" required/>
                    </div>
                     <div class="form-group">
                        <label>Select Department</label>
                        
                        <select  class="form-control" name="dept" >
                             <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from department"); 
                                               
                                                  
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<option value="'.$row["depId"].'"> '.$row["depName"].'</option>
                                                         ';
                                                    //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                                                } 
                                                
                                            
                                         ?>
                             
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Select Course</label>
                          <select  class="form-control" name="course" >
                             <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from course"); 
                                               
                                                  
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<option value="'.$row["couId"].'"> '.$row["couName"].'</option>
                                                         ';
                                                    //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                                                } 
                                                
                                            
                                         ?>
                             
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Enter Password" required/>
                    </div>
                     <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image"/>
                    </div>
                    <input type="hidden" name="action" value="REG">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!------End Profile Section--------->
                
			
		</div></div>
		<div class="info">
			<div class="loginBox">
		<img src="test5.png" class="user">
		<h2>Log In Here</h2>
		<form role="form" action="server.php" class="aviform" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Email Id</label>
                        <input class="form-control" name="id" placeholder="Enter Email Id" required/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required/>
                    </div>
                  
                    <input type="hidden" name="action" value="LOGIN">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
		</div></div>
		
		
  </div>
</div>

<div class="content-section">
  <div class="container-boxs">
    <div class="content-text">
      <h1>VIT University</h1>
      <p>VIT is a progressive educational institution that is dedicated to the pursuit of excellence. Students here are encouraged on this journey by our committed faculty, world-class facilities and student-friendly educational systems.
VIT was founded in 1984 by Dr. G. Viswanathan, a former parliamentarian and minister in the Tamil Nadu Government, as a self-financing institution called the ‘Vellore Engineering College’. Since then the institution has grown from strength to strength </p>
    </div>
  </div>
</div>
<div class="container-boxs" id="notification">
		<p><h4>The website is currently under construction</h4></p>
		<a href="#" id="notification-hide">click</a>
	
	</div>

 <footer>
   <div class="container-boxs" id="foot">
     <p>Footer area</p>
   </div>
 </footer>
</body>
</html>																																																			