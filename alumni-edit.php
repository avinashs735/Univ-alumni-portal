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
            echo "<script> alert('Successfully Updated');</script>";
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
    $email=$_SESSION["gk"];
    
    include_once ("phplib/dataservice.php");
    $id="";                                    
   $ds=new dataservice();
    $res=$ds->fetch_query("select * from alumni where aluEmail='".$email."'"); 
   
      
    while($row=mysqli_fetch_assoc($res))
    {
         $id=$row["aluId"]; 
         $name=$row["aluName"];
         $fname=$row["aluFName"];
         $batch=$row["aluBatch"];
         $phone=$row["aluPhone"];
         $pwd=$row["aluPwd"];           
           
    }  
    
                 
     
 
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
                  Profile Edit
             </div>
              <form role="form" action="server.php" class="aviform" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter Name" value="<?php echo $name;?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input class="form-control" name="fname" placeholder="Enter Father Name" value="<?php echo $fname;?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Batch</label>
                        <input class="form-control" name="batch" placeholder="Enter Batch Year (201*-201*)" value="<?php echo $batch;?>" required/>
                    </div>
                  
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo $phone;?>" required/>
                    </div>
                
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="pwd" placeholder="Enter Password" value="<?php echo $pwd;?>" required/>
                    </div>
                    
                    <input type="hidden" name="aluid" value="<?php echo $id;?>">
                    <input type="hidden" name="action" value="EDIT">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
             
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