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
                case 'REG':
                    reg();
                    break;
                case 'COURSE':
                    course();
                    break;
                case 'RESUME':
                    resume();
                    break;
                case 'LANE':
                    lane();
                    break;
                case 'JOB':
                    job();
                    break;
                case 'REUNION':
                    reunion();
                    break;
                case 'EDIT':
                    edit();
                    break;
               
               
            }
        }

        
     //--------------Login Entry-----------//
     function login()
     {
         $ds=new dataservice();
         $id=$_REQUEST['id'];
         $pwd=$_REQUEST['pwd'];
         $res=$ds->does_exist("select * from alumni where aluEmail='".$id."' and aluPwd='".$pwd."' and aluStatus='YES'");
        // echo "select * from alumni where aluEmail='".$id."' and aluPwd='".$pwd."'";
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
   
     //----------Registration Entry----------//
    function  reg()
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
                header("location:index.php?ins=file");
              }
              
              if($file_size > 4097152){
                 $errors[]='File size must be excately 4 MB';
                header("location:index.php?ins=size");
              }
              
              if(empty($errors)==true)
              {
                $path="images/profile/".$file_name;
                move_uploaded_file($file_tmp,"admin/images/profile/".$file_name);
                
                
                $name=$_POST['name'];
                $fname=$_POST['fname'];
                $batch=$_POST['batch'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $dept=$_POST['dept'];
                $course=$_POST['course'];
                $pwd=$_POST['pwd'];
              
                
                $date =GetCurrentDateTimeByZone();
                $query="insert into alumni (aluDepId,aluCouId,aluName,aluFName,aluBatch,aluEmail,aluPhone,aluPwd,aluDate_Time,aluStatus,aluImg) values(".$dept.",".$course.",'".$name."','".$fname."','".$batch."','".$email."','".$phone."','".$pwd."','".$date."','NO','".$path."')";
               echo $query;
                $res=$ds->insert_data($query);
                
                if($res==1)
                {
                   header("location:index.php?ins=succ");
                }
              }
              else{
                 //print_r($errors);
                 header("location:index.php?ins=error");
              }
           }
         //-------- End Image Upload Code-----//
         
    }
    //----------Department Entry----------//
    function  lane()
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
                header("location:index.php?ins=file");
              }
              
              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
                header("location:index.php?ins=size");
              }
              
              if(empty($errors)==true)
              {
                $path="images/lane/".$file_name;
                move_uploaded_file($file_tmp,"admin/images/lane/".$file_name);
                
                $desc=$_REQUEST['desc'];
                $aluid= $_REQUEST['aluid'];
                $date =GetCurrentDateTimeByZone();
               
                $query="insert into memory_lane(memAluId, memDesc, memImg,memDate_Time) values(".$aluid.",'".$desc."','".$path."','".$date."')";
               // echo $query;
                $res=$ds->insert_data($query);
                
                if($res==1)
                {
                   header("location:memorylane.php?ins=succ");
                }
              }
              else{
                 //print_r($errors);
                 header("location:memorylane.php?ins=error");
              }
           }
         //-------- End Image Upload Code-----//
         
    }
     //----------Course Entry----------//
    function  resume()
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
              
              $expensions= array("jpeg","jpg","png","pdf","docx","doc");
              
              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a Docx or PDF file.";
                header("location:index.php?ins=file");
              }
              
              if($file_size > 2097152){
                 $errors[]='File size must be excately 2 MB';
                header("location:index.php?ins=size");
              }
              
              if(empty($errors)==true)
              {
                $path="images/resume/".$file_name;
                move_uploaded_file($file_tmp,"admin/images/resume/".$file_name);
                
                
                $aluid= $_REQUEST['aluid'];
               
               
                $query="update alumni set aluResume='".$path."' where aluId=".$aluid."";
               // echo $query;
                $res=$ds->update_data($query);
                
                if($res==1)
                {
                   header("location:memorylane.php?ins=succ");
                }
              }
              else{
                 //print_r($errors);
                 header("location:memorylane.php?ins=error");
              }
           }
         //-------- End Image Upload Code-----//
         
    }
   
     //------- News Entry----------//
    function job()
    {
        
        $ds=new dataservice();
        $title=$_REQUEST['title'];
        $desc=$_REQUEST['desc'];
        $aluid= $_REQUEST['aluid'];
        $date =GetCurrentDateTimeByZone();
       
        $query="insert into job (jobAluId, jobTitle,jobDesc, jobDate_Time) values(".$aluid.",'".$title."','".$desc."','".$date."')";
       // echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:job-new.php?ins=succ");
        }
    }
     //------- Edit Entry----------//
    function edit()
    {
        
        $ds=new dataservice();
        $name=$_REQUEST['name'];
        $fname=$_REQUEST['fname'];
        $batch=$_REQUEST['batch'];
        $phone=$_REQUEST['phone'];
        $pwd=$_REQUEST['pwd'];
        $aluid= $_REQUEST['aluid'];
        
       
        $query="update alumni set aluName='".$name."',aluFName='".$fname."',aluBatch='".$batch."',aluPhone='".$phone."',aluPwd='".$pwd."' where aluId=".$aluid."";
       // echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:alumni-edit.php?ins=succ");
        }
    }
     //------- Reunion Entry----------//
    function reunion()
    {
        
        $ds=new dataservice();
        $title=$_REQUEST['title'];
        $location=$_REQUEST['location'];
        $desc=$_REQUEST['desc'];
        $aluid= $_REQUEST['aluid'];
        $date =GetCurrentDateTimeByZone();
       
        $query="insert into reunion (reuAluId, reuLocation,reuTitle,reuDesc,reuDate_Time) values(".$aluid.",'".$location."','".$title."','".$desc."','".$date."')";
        echo $query;
        $res=$ds->insert_data($query);
        
        if($res==1)
        {
           header("location:reunion-new.php?ins=succ");
        }
    }
    
    
  
    
    //http://labs.jonsuh.com/jquery-ajax-php-json/
    //https://jonsuh.com/blog/jquery-ajax-call-to-php-script-with-json-return/
    //http://labs.jonsuh.com/jquery-ajax-php-json/


?>