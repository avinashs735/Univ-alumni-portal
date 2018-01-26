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
                  Memory Lane
             </div>
              <?php
                                             
                       $ds=new dataservice();
                        $res=$ds->fetch_query("select * from memory_lane,alumni where memory_lane.memAluId=alumni.aluId order by memId desc"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                                         
                               echo '  <div class="sce">
                                    <div class="sce-title  f15">
                                       <img src="admin/'.$row["aluImg"].'" width="50px"> '.$row["aluName"].' <span> '.$row["aluBatch"].' </span>
                                    </div>
                                     <div class="sce-sdesc">
                                      '.$row["memDesc"].'
                                    </div>
                                    <div class="sce-photo">
                                        <img src="admin/'.$row["memImg"].'" alt="" class="img-responsive">
                                    </div>
                                    
                                    <div class="hr1"></div>
                                    <div class="sce-meta f12 ">
                                       <span class="glyphicon glyphicon-calendar"></span> '.$row["memDate_Time"].'
                                    </div>
                                   
                                </div>';
                        }  
                        
                    
                 ?>
             
            
          
           
            
            
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