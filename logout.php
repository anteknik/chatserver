<?php
$userid = $_POST['userid'];
$deviceid = $_POST["deviceid"];

include("db.php");

   include_once './GCM.php';
     $cklogin = new GCM();
     
     $result = $cklogin->checkuserlogin($userid, $deviceid);
     
     if($result=='loggedin')
     {


include("db.php");
$query1 = "SELECT * FROM usertable where userid='" . $userid . "';";
$result1 = mysqli_query($conn, $query1) or die(mysql_error());

if (mysqli_num_rows($result1) > 0) {

    $query = "UPDATE `usertable` set "
            . "isloggin='no', gcmid='no' "
            . "where userid=" . $userid;
//    echo $query;
    $result = mysqli_query($conn, $query);
    
    if ($result == 1) {
        $response["success"] = 1;
          $response["message"] = "Logout Succeessfully";
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Please try again!";
        echo json_encode($response);
    }
} else {
   
        $response["success"] = 0;
        $response["message"] = "Please try again!";
        echo json_encode($response);
    
}

}else
     {
          $response["success"] = "false";
           $response["message"] = "User Not Logged in.";
           echo json_encode($response);
     }

 
 
