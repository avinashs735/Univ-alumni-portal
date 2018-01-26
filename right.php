  <?php
    //session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
        header('Location: index.php');
    }
   // $id=$_SESSION["gk"];
    include_once ("phplib/dataservice.php");

 
?>
 <div class="col-md-3" >
                <!------Start Latest Article and Poem Section--------->
                <div class="la-title-top heading">
                  Latest News
                </div>
                <?php
                                            
                        $ds=new dataservice();
                        $res=$ds->fetch_query("select * from news order by newId desc"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo ' <div class="la">
                                    <div class="la-title">
                                      <img src="images/la-1.png" class="img-circle" > '.$row["newTitle"].'
                                    </div>
                                    <div class="la-meta" style="margin-left:44px">
                                        '.$row["newDate_Time"].'
                                    </div>
                                </div>';
                            //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                        } 
                        
                    
                 ?>
               
               
                <!------End Latest Article and Poem Section--------->
                <!------Start Our Members--------->
                <div class="la-title-top heading">
                  Latest Jobs
                </div>
                  <?php
                                            
                        $ds=new dataservice();
                        $res=$ds->fetch_query("select * from job,alumni where job.jobAluId=alumni.aluId order by jobId desc"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo ' <div class="la">
                                    <div class="la-title">
                                      <img src="images/la-2.png" class="img-circle" > '.$row["jobTitle"].'
                                    </div>
                                    <div class="la-meta" style="margin-left:44px">
                                        '.$row["aluName"].'
                                    </div>
                                </div>';
                            //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                        } 
                        
                    
                 ?>
              
                <!------End Our Members--------->
             </div>