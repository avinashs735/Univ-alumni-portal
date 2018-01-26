 <?php
   // session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
        header('Location: index.php');
    }
    $email=$_SESSION["gk"];
    
    include_once ("phplib/dataservice.php");
   
 
?>
 <div class="col-md-3" >
                <!------Start Profile Section--------->
                <div class="p-photo">
               
                     <?php
                                             
                       $ds=new dataservice();
                        $res=$ds->fetch_query("select aluImg from alumni where aluEmail='".$email."'"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo '  <img src="admin/'.$row["aluImg"].'" height="200px">';
                           
                        }  
                        
                    
                 ?>
                
                   
                </div>
                <div class="profile-menu">
                    <a href="alumni-edit.php">Edit Profile</a>
                    <a href="memorylane.php">Post in Memory Lane</a>
                    <a href="job-new.php">Post Job</a>
                    <a href="Memories.php">Your Memories</a>
					<a href="Memories.php">Messages</a>
                    <a href="reunion-new.php">  Post Reunion </a>
                    
                </div>
                <!------End Profile Section--------->
                <!------Start Event--------->
                <div class="la-title-top heading">
                  Latest Events
                </div>
                 <?php
                                            
                        $ds=new dataservice();
                        $res=$ds->fetch_query("select * from event"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo ' <div class="la">
                                    <div class="la-title">
                                      <img src="images/la-3.png" class="img-circle" > '.$row["eveTitle"].'
                                    </div>
                                    <div class="la-meta" style="margin-left:44px">
                                        '.$row["eveDate_Time"].'
                                    </div>
                                </div>';
                            //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                        } 
                        
                    
                 ?>
                
               
                <!------End Event--------->
             </div>