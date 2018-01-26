<?php
  session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
       header('Location: index.php');
    }
 include_once ("phplib/dataservice.php");
 if(isset($_REQUEST['del']))
 {
     $ds=new dataservice();
     $res=$ds->update_data("update alumni set aluStatus='YES' where aluId=".$_REQUEST['del']);
         
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
            <?php include "nav.php";?>
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
                 <!-- /.start second ROW  -->
                   <div class="row">
                
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    
                   <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
                    <?php
                      $ds=new dataservice();
                     $res1=$ds->fetch_query("select count(*) as total from memory_lane");
                      while($row=mysqli_fetch_assoc($res1))
                      {
                         echo   $row['total'];
                      }
                      ?>
                     &nbsp;&nbsp;&nbsp; Posts</p>
                    <p class="text-muted">Memory Lane</p>
                </div>
             </div>
		     </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                     <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
                       <?php
                      $ds=new dataservice();
                     $res2=$ds->fetch_query("select count(*) as total from alumni");
                      while($row=mysqli_fetch_assoc($res2))
                      {
                         echo   $row['total'];
                      }
                      ?>
                     &nbsp;&nbsp;&nbsp; Alumni</p>
                    <p class="text-muted">Total Registered</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
                      <?php
                      $ds=new dataservice();
                     $res3=$ds->fetch_query("select count(*) as total from alumni where aluStatus='NO'");
                      while($row=mysqli_fetch_assoc($res3))
                      {
                         echo   $row['total'];
                      }
                      ?>
                     Alumni</p>
                    <p class="text-muted">Verification Pending</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    
                   <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">
                      <?php
                      $ds=new dataservice();
                     $res4=$ds->fetch_query("select count(*) as total from job");
                      while($row=mysqli_fetch_assoc($res4))
                      {
                         echo   $row['total'];
                      }
                      ?>
                     &nbsp;&nbsp;&nbsp; Jobs</p>
                    <p class="text-muted">Total Jobs</p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /.end of second ROW  -->
                  <hr />
                  <div class="row" >
        
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           New Alumni
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            
                                           <th>Alumni Name</th>
                                            <th>Father Name</th>
                                            <th>Batch</th>
                                            <th>Department</th>
                                            <th>Course</th>
                                            <th>Verify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from alumni,course,department where course.couId=alumni.aluCouId and department.depId=alumni.aluDepId and aluStatus='NO'"); 
                                                 
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<tr><td>'.$row["aluName"].'</td>
                                                           
                                                           <td>'.$row["aluFName"].'</td>
                                                           <td>'.$row["aluBatch"].'</td>
                                                         
                                                           <td>'.$row["depName"].'</td>
                                                           <td>'.$row["couName"].'</td>
                                                         
                                                           <td><a href="index-inner.php?del='.$row["aluId"].'">Approve</a></td>
                                                           </tr>';
                                                    //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                                                } 
                                                
                                            
                                         ?>

                                    </tbody>
                                </table>
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
