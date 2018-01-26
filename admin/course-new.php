<?php
session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
        header('Location: index.php');
    }
if(isset($_REQUEST['ins']))
{
    if($_REQUEST['ins']=="succ")
    {
        echo "<script> alert('Successfully Added');</script>";
    }
    else if($_REQUEST['ins']=="file")
    {
        echo "extension not allowed, please choose a JPEG or PNG file.";
    }
    else if($_REQUEST['ins']=="size")
    {
        echo "File size must be excately 2 MB";
    }
    else 
    {
        echo "Problem in uploading.";
    }       
 }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel :: Alumni Portal</title>
	<!--Start Css File-->
    <?php include "css.php"; ?>
    <!--End Css File-->
</head>
<body>
    <div id="wrapper">
        <!--Start TOP Nav-->
            <?php include "nav.php"; ?>
        <!--End TOP Nav-->  
           <!-- /. NAV TOP  -->
        <!---Start Side Menu-->
            <?php include "side-menu.php"; ?>
        <!--End Side Menu-->
        <!---Start Page Wraper-->
           <div id="page-wrapper" >
            <div id="page-inner">
                   <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome at admin panel. </h5>
                    </div>
                </div>              
               
                  <hr />
                  <div class="row" >
        
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add New Course
                        </div>
                        <div class="panel-body">
                             <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    
                                    <form role="form" action="server.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Department Id</label>
                                            <input class="form-control" name="id" placeholder="Enter Department Id" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input class="form-control" name="name" placeholder="Enter Course Name" required/>
                                        </div>
                                      
                                        <input type="hidden" name="action" value="COURSE">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    </div>
            </div>    
                
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
   <!--Start JS File-->
    <?php include "js.php"; ?>
    <!--End JS File-->
   
</body>
</html>