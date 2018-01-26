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
     $res=$ds->delete_data("delete from job where jobId=".$_REQUEST['del']."");
         
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
               
                  <hr />
                  <div class="row" >
        
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           All Job
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                          <tr>
                                           
                                            <th>Job Title</th>
                                            <th>Description</th>
                                            <th>Posted By (Alumni)</th>
                                            <th>Batch</th>
                                            <th>Date</th>
                                           
                                            <th>Delete</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from job,alumni where job.jobAluId=alumni.aluId order by jobId desc"); 
                                               
                                                  
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<tr>
                                                            <td>'.$row["jobTitle"].'</td>
                                                             <td>'.$row["jobDesc"].'</td>
                                                              <td>'.$row["aluName"].'</td>
                                                             <td>'.$row["aluBatch"].'</td>
                                                            <td>'.$row["jobDate_Time"].'</td>
                                                                                          
                                                           <td><a href="job-all.php?del='.$row["jobId"].'">Delete</a></td>
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