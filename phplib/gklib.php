<?php
 
      
      function GetCurrentDateTimeByZone($locality = 'Asia/Calcutta')
    {
         $datetime = new DateTime(); 
         $datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
         $x = $datetime->format('Y-m-d H:i:s');
         return $x;
    
    
    }   
     function GetCurrentDateByZone($locality = 'Asia/Calcutta')
    {
         $datetime = new DateTime(); 
         $datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
         $x = $datetime->format('Y-m-d');
         return $x;
    
    
    } 
     function GetDateByZone($date,$locality = 'Asia/Calcutta')
    {
         //$datetime = new DateTime(); 
         $date->setTimezone(new DateTimeZone('Asia/Calcutta'));
         $x = $date->format('Y-m-d');
         return $x;
    
    
    }     
    function GetUTCDateByZone($locality = 'Asia/Calcutta')
    {
         $datetime = new DateTime(); 
          $datetime->setTimezone(new DateTimeZone('UTC'));
         $x = $datetime->format('Y-m-d');
         return $x;
    
    }   
     function GetUTCDateTimeByZone($locality = 'Asia/Calcutta')
    {
         $datetime = new DateTime(); 
          $datetime->setTimezone(new DateTimeZone('UTC'));
         $x = $datetime->format('Y-m-d H:i:s');
         return $x;
    
    }   
  
?>
