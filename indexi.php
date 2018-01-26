<?php
session_start();
    //Write code to check session
 include_once ("phplib/dataservice.php");  
if(isset($_REQUEST['ins']))
{
    if($_REQUEST['ins']=="succ")
    {
        echo "<script> alert('Successfully Registered. Once Admin will approve than you will be able to login.');</script>";
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
 if(isset($_REQUEST['login']))
{
    if($_REQUEST['login']=="fail")
    {
        echo "<script> alert('Your Account is not verified by admin.Contact with admin');</script>";
    }
        
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="en-us" />
    <meta name="title" content="Alumni Portal " />
    <title>Alumni Portal</title>
    <meta name="keywords" content="Alumni Portal" />
    <meta name="description" content="Alumni Portal" />
    <link rel="canonical" href="#" />

    
    <meta name="copyright" content="" />
    <meta name="msvalidate.01" content="E9FC66097D3DBD3E7C1462EF7951B7C6" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!--comment it while going for deployment-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/avi.css"/>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--Uncomment the css in deployment mode
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>-->
    

     <!--[if lt IE 9]>
     <link href="/Content/ie.min.css" rel="stylesheet" />
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        //<![CDATA[
        (window.jQuery) || document.write('<script type="text/javascript" src="/Scripts/jquery-1.8.2.min.js"><\/script>');//]]>
    </script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!--Code to dectect when java script is disabled-->
    <noscript>
        <div class="noscript">
            <div>
                <span>Please enable Javascript to correctly display the contents on Dot Net Tricks!</span>
            </div>
        </div>
    </noscript>
    <!--End Code to dectect when java script is disabled-->

</head>
<body>
    <!--Start Header Top-->
   
  <div id="header-top" class="container">
       
        <div class="row">
            <div class="col-md-4 col-sm-12">
               <img src="images/upt-logo.gif" height="100px" alt="">
                   
            </div>
            <div class="col-md-4 col-sm-12 f22 text-center">
                <span style="padding:10px 0;display:inline-block;font-weight:bold;size:20px;">Alumni Portal <br/> <br/>UPTEC Allahabad</span>
            </div>
            <div id="pm1" class="col-md-4 col-sm-12 text-right">
                 <img src="images/su-logo.jpg" height="100px" alt="">
                 
            </div>
        </div>
       
    </div>
    <!--End Header Top-->
  
    <!--Start Contnet-->
    <div id="content" class="container">
        <div class="row">
            <!--Start Left-->
            <div class="col-md-6" >
                <!------Registration--------->
                <div class="la-title-top heading">
                  Registration Form
                </div>
                 <form role="form" action="server.php" class="aviform" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter Name" required/>
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input class="form-control" name="fname" placeholder="Enter Father Name" required/>
                    </div>
                    <div class="form-group">
                        <label>Batch</label>
                        <input class="form-control" name="batch" placeholder="Enter Batch Year (2010-2013)" required/>
                    </div>
                    <div class="form-group">
                        <label>Email Id</label>
                        <input class="form-control" name="email" placeholder="Enter Email" required/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="Enter Phone" required/>
                    </div>
                     <div class="form-group">
                        <label>Select Department</label>
                        
                        <select  class="form-control" name="dept" >
                             <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from department"); 
                                               
                                                  
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<option value="'.$row["depId"].'"> '.$row["depName"].'</option>
                                                         ';
                                                    //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                                                } 
                                                
                                            
                                         ?>
                             
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Select Course</label>
                          <select  class="form-control" name="course" >
                             <?php
                                            
                                                $ds=new dataservice();
                                                $res=$ds->fetch_query("select * from course"); 
                                               
                                                  
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    echo '<option value="'.$row["couId"].'"> '.$row["couName"].'</option>
                                                         ';
                                                    //echo    $row["cmsCCurrentStatus"].$row["cmsCOrgHeadName"];
                                                } 
                                                
                                            
                                         ?>
                             
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Enter Password" required/>
                    </div>
                     <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image"/>
                    </div>
                    <input type="hidden" name="action" value="REG">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!------End Profile Section--------->
                
             </div>
            <!--End Left-->
            <!--Start Center-->
            <div class="col-md-6">
                <!--------Start Login--------->
                 <div class="la-title-top heading">
                      Login Form
                 </div>
                  <form role="form" action="server.php" class="aviform" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Email Id</label>
                        <input class="form-control" name="id" placeholder="Enter Email Id" required/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required/>
                    </div>
                  
                    <input type="hidden" name="action" value="LOGIN">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              <!------End Login--------->
              <img src="images/uptec.jpg" class="img-responsive">
        </div>
            <!--End Center-->
        
        </div>
    </div>
    <!--End Content-->
   
    <!--Start Footer-->
    <div id="footer" class="container-fluid">
       Copyright @ Anjali Sharma & Vivek Kumar Dubey 2016
    </div>
    <!--End Footer-->

</body>
<!--comment it while going for deployment-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--Uncomment it while going for deployment
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--Jquery Code for Sir Modi Jee Animation-->
<script type="text/javascript">
    $(function () {
        $("#pm").animate(
                { "right": "200px" },
                1000,
                function () {
                    $("#pm").animate(
                                { "right": "30px" },
                                500,
                function () {
                    $("#pm").animate(
                                { "right": "170px" },
                                500,
                                function () {
                                    $("#pm").animate({ "right": "0px" }, 500);
                                }
                                )
                }

                        )
                }
        );
    });
</script>
<!--End Jquery Code for Sir Modi Jee Animation-->
</html>                                        