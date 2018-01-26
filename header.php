 <?php
   // session_start();
    //Write code to check session
    if (!isset($_SESSION["gk"])) {
        header('Location: index.php');
    }
    $email=$_SESSION["gk"];
    
    include_once ("phplib/dataservice.php");
   
 
?>
<div id="header-top" class="container">
       
        <div class="row">
            <div class="col-md-4 col-sm-12">
               <img src="images/25914_VIT_New.jpg" height="100px" alt="">
                   
            </div>
            <div class="col-md-4 col-sm-12 f22 text-center">
                <span style="padding:10px 0;display:inline-block;font-weight:bold;size:20px;">Alumni Portal <br/> <br/>VIT University</span>
            </div>
            <div id="pm1" class="col-md-4 col-sm-12 text-right">
                 <img src="images/vit_logo.jpg" height="100px" alt="">
                 
            </div>
        </div>
       
    </div>
    
  
    <div id="searchbar" class="container">
         <div id="searchheader" class="row" style="background:#000053;padding:7px 0">
             <div class="col-md-3 col-sm-12">
              <?php
                                             
                       $ds=new dataservice();
                        $res=$ds->fetch_query("select aluName from alumni where aluEmail='".$email."'"); 
                       
                          
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo '   <span style="vertical-align:middle"> '.$row["aluName"].'</span>';
							
                           
                        }  
                        
                    
                 ?>
             
                   
            </div>
            <div class="col-md-6 col-sm-12 f16 text-center">
                  <span style="vertical-align:middle;font-weight:normal"> 
                 <a href="index-inner.php"> Home </a>| 
                 <a href="event.php"> Events </a>|
                 <a href="news.php">  News </a> |
				 <a href="reunion.php">Reunion</a>|
				 <a href="chat.php">  Chat </a>
                 
            </div>
            <div id="Div1" class="col-md-3 col-sm-12 text-right">
               <span style="vertical-align:middle"> <a href="server.php?action=LOGOUT"> Logout</a> </span>
                 
            </div>
        </div>
    </div>