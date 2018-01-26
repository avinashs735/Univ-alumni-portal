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
     $res=$ds->delete_data("delete from paticipents where parId=".$_REQUEST['del']."");
         
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
                           All Designers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                          <tr>
                                            
                                           <th>Image</th>
                                           <th>Alumni Name</th>
                                            <th>Father Name</th>
                                            <th>Batch</th>
                                            <th>Department</th>
                                            <th>Course</th>
                                             <th>Email</th>
                                            <th>Phone</th>
                                            
                                            <th>Verify</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from alumni,course,department where course.couId=alumni.aluCouId and department.depId=alumni.aluDepId and aluStatus='NO'"); 
                                                 
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<tr><td><img src='.$row["aluImg"].' width="50px"/></td>
                                                            <td>'.$row["aluName"].'</td>
                                                             <td>'.$row["aluFName"].'</td>
                                                            <td>'.$row["aluBatch"].'</td>
                                                            <td>'.$row["depName"].'</td>
                                                           <td>'.$row["couName"].'</td>
                                                            <td>'.$row["aluEmail"].'</td>
                                                            
                                                            <td>'.$row["aluPhone"].'</td>
                                                            
                                                           <td><a href="alumni-all-verify.php?del='.$row["aluId"].'">Delete</a></td>
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