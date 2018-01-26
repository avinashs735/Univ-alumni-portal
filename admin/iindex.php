<?php
	$con=mysqli_connect("localhost","root","","alumnidb");
	
	if(!$con)
	{
		die("Not Connected" . mysqli_error());
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
       
       <div class="row">
           <div class="col-md-3">
           
           </div>
           <div class="col-md-6">
                    <br/> <br/>
                  <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 style="color:Green">Admin Login Form </h3>
                        </div>
                        <div class="panel-body">
                             <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    if(isset($_POST['btn1']))
								{
									$id = addslashes($_REQUEST['id']);
									$pwd = addslashes($_REQUEST['pwd']);
									
									$query = "select * from login where id='$id' and pwd='$pwd'";
									if($c =	 mysqli_query($con,$query))
									{
										if(mysqli_num_rows($c)>0)
										{
											$res =  mysqli_fetch_array($c);
											if($res['id']==$id && $res['pwd']==$pwd)
											{
												
												$_SESSION['id']=$res['cust_id'];
												header("Location:index-inner.php");
											}
											
											else
											{
													$msg = "Login fail,Try again";
													echo $msg;
											}
										}
										else
										{
											$msg = "Login fail";
											echo $msg;
										}
									}
									else
									{
										$msg="Login fail error";
									}
								}
								?>
									
                                    <form role="form" action="server.php" method="POST">
                                        <div class="form-group">
                                            <label>Login ID</label>
                                            <input class="form-control" name="id" placeholder="Login ID" />
                                        </div>
                                         <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pwd"  />
                                        </div>
                                       
                                        <input type="hidden" name="action" value="LOGIN">
                                        <button type="submit" name="btn1" class="btn btn-success btn-lg">Login</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>   
           
           </div>
            <div class="col-md-3">
           
           </div>
       </div>
       
           
    </div>
       
    
    <!--Start JS File-->
    <?php include "js.php"; ?>
    <!--End JS File-->
   
</body>
</html>
