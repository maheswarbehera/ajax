<?php
    include "db.php";

    $type = 0;
    if(isset($_POST['type'])){
       $type = $_POST['type'];
    }
    
    // Search result
    if($type == 1){
        $searchText = mysqli_real_escape_string($con,$_POST['search']);
    
        $sql = "SELECT user_id,firstname FROM admin_user where firstname like '%".$searchText."%' order by firstname asc limit 5";
    
        $result = mysqli_query($con,$sql);
    
        $search_arr = array();
    
        while($fetch = mysqli_fetch_assoc($result)){
            $id = $fetch['user_id'];
            $name = $fetch['firstname'];
    
            $search_arr[] = array("user_id" => $id, "firstname" => $name);
        }
    
        echo json_encode($search_arr);
    }
    
    // get User data
    if($type == 2){
        $userid = mysqli_real_escape_string($con,$_POST['userid']);
    
        $sql = "SELECT user_id,firstname,lastname,email FROM admin_user where user_id=".$userid;
    
        $result = mysqli_query($con,$sql);
    
        $return_arr = array();
        while($fetch = mysqli_fetch_assoc($result)){
            $uid = $fetch['user_id'];
            $fname = $fetch['firstname'];
            $lname = $fetch['lastname'];
            $email = $fetch['email'];
    
            $return_arr[] = array("user_id"=>$uid,"firstname"=>$fname,"lastname"=>$lname, "email"=> $email);
        }
    
        echo json_encode($return_arr);
    }
?>