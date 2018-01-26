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
                 All Alumni
             </div>
              <?php
                                             
                       $ds=new dataservice();
                        $res=$ds->fetch_query("select * from alumni,course,department where course.couId=alumni.aluCouId and department.depId=alumni.aluDepId and aluStatus='YES' order by aluName "); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                                         
                               echo ' <div class="col-md-6" style="padding:10px;background:#fff;border:2px solid #f2f3f4">
                                    <div class="sce-title  f15">
                                       <img src="admin/'.$row["aluImg"].'" width="180px" height="200px">   
                                    </div>
                                     <div class="sce-sdesc">
                                     <b>'.$row["aluName"].'</b>  ('.$row["aluBatch"].')
                                    </div>
                                    <div>
                                      '.$row["depName"].' | '.$row["couName"].'
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