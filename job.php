<?php
   session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
        header('Location: index.php');
    }
 
    
    include_once ("phplib/dataservice.php");
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "css.php"; ?>
</head>
<body>
    <!--Start Header Top-->
    <?php include "header.php";?>
   <!--End Header Top-->
    <!--Start Contnet-->
    <div id="content" class="container">
        <div class="row">
            <!--Start Left-->
                <?php include "left.php";?>
            <!--End Left-->
            <!--Start Center-->
            <div class="col-md-6">
             <div class="la-title-top heading">
                 Job
             </div>
              <?php
                                             
                       $ds=new dataservice();
                        $res=$ds->fetch_query("select * from job,alumni where job.jobAluId=alumni.aluId order by jobId desc"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                                         
                               echo ' <div class="sce">
                                    <div class="sce-title  f15">
                                       <img src="images/la-1.png" width="30px"> '.$row["jobTitle"].' 
                                    </div>
                                     <div class="sce-sdesc">
                                     '.$row["jobDesc"].'
                                    </div>
                                   
                                    
                                    <div class="hr1"></div>
                                    <div class="sce-meta f12 ">
                                        <span class="glyphicon glyphicon-calendar"></span>  '.$row["jobDate_Time"].'
                                        Posted By : '.$row["aluName"].'
                                    </div>
                                   
                                </div>';
                        }  
                        
                    
                 ?>
             
            <!--End Post 3-->
        </div>
            <!--End Center-->
         <!--Start Right-->
            <?php include "right.php";?>   
         <!--End Right-->
        </div>
    </div>
    <!--End Content-->
   
    <!--Start Footer-->
   <?php include "footer.php";?>