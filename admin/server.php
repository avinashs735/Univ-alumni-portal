<?php
    session_start();
    //--------------Including GK Library File-----------//
     include_once("phplib/gklib.php");
    //-------------Includeing dataservce file----------//
    include_once ("phplib/dataservice.php");
     //-------------Creating object of dataservice--------//
     
   
    //-------------------Getting ajax value -----------------------------//
 
        if (isset($_REQUEST['action'])) {
            switch ($_REQUEST['action']) {
                case 'LOGIN':
                    login();
                    break;
                case 'LOGOUT':
                    logout();
                    break;
                case 'DEPT':
                    dept();
                    break;
                case 'COURSE':
                    course();
                    break;
                case 'BLOG':
                    blog();
                    break;
                case 'NEWS':
                    news();
                    break;
                case 'EVENT':
                    event();
                    break;
               
               
            }
        }

        
     //--------------Login Entry-----------//
     function login()
     {
         $ds=new dataservice();
         $id=$_REQUEST['id'];
         $pwd=$_REQUEST['pwd'];
         $res=$ds->does_exist("select * from login where id='".$id."' and pwd='".$pwd."'");
         if($res==1)
         {
             $_SESSION["gk"]=$id;
            echo "<script>";
                  echo "location.href='index-inner.php'";
              echo "</script>";  
         }
         else
         {
            header("location:index.php?login=fail");
         }
		 
		 
		 
     }
     //--------------Logout-----------------/
     function logout()
     {
         
        // Delete certain session
        unset($_SESSION['gk']);
        // Delete all session variables
        // session_destroy();

        // Jump to login page
        header('Location: index.php');
     }
   
    
    //----------Department Entry----------//
    function  dept()
    {
        $ds=new dataservice();
        $name=$_REQUEST['name'];
       
       
        $query="insert into department (depName) values('".$name."')";
       // echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:department-new.php?ins=succ");
        }
         
    }
     //----------Course Entry----------//
    function  course()
    {
        $ds=new dataservice();
        $id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
       
       
        $query="insert into course (couDepId,couName) values(".$id.",'".$name."')";
       // echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:course-new.php?ins=succ");
        }
         
    }
    //----------Blog Entry----------//
    function  blog()
    {
        $ds= new dataservice();
        //----Image Upload Code-----/
         if(isset($_FILES['image']))
         {
              $errors= array();
              $file_name = $_FILES['image']['name'];
              $file_size =$_FILES['image']['size'];
              $file_tmp =$_FILES['image']['tmp_name'];
              $file_type=$_FILES['image']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
              
              $expensions= array("jpeg","jpg","png");
              
              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                header("location:blog-new.php?ins=file");
              }
              
              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
                header("location:blog-new.php?ins=size");
              }
              
              if(empty($errors)==true)
              {
                $path="images/blog/".$file_name;
                move_uploaded_file($file_tmp,"images/blog/".$file_name);
                
                $title=$_POST['title'];
                $desc=$_POST['desc'];
                $date =GetCurrentDateTimeByZone();
                $query="insert into blog (blgTitle,blgDesc,blgImg,blgDate) values('".$title."','".$desc."','".$path."','".$date."')";
              //  echo $query;
                $res=$ds->insert_data($query);
                
                if($res==1)
                {
                   header("location:blog-new.php?ins=succ");
                }
              }
              else{
                 //print_r($errors);
                 header("location:blog-new.php?ins=error");
              }
           }
         //-------- End Image Upload Code-----//
         
    }
     //------- News Entry----------//
    function news()
    {
        
        $ds=new dataservice();
        $name=$_REQUEST['name'];
        $desc=$_REQUEST['desc'];
        $date =GetCurrentDateTimeByZone();
       
        $query="insert into news (newTitle, newDesc, newDate_Time) values('".$name."','".$desc."','".$date."')";
       // echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:news-new.php?ins=succ");
        }
    }
     //------- Event Entry----------//
    function event()
    {
        
        $ds=new dataservice();
        $name=$_REQUEST['name'];
        $desc=$_REQUEST['desc'];
        $date =GetCurrentDateTimeByZone();
       
        $query="insert into event (eveTitle, eveDesc, eveDate_Time) values('".$name."','".$desc."','".$date."')";
        echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:event-new.php?ins=succ");
        }
    }
    
    
  
    
    //http://labs.jonsuh.com/jquery-ajax-php-json/
    //https://jonsuh.com/blog/jquery-ajax-call-to-php-script-with-json-return/
    //http://labs.jonsuh.com/jquery-ajax-php-json/


?>