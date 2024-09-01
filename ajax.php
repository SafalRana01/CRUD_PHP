<?php

// this is the command to check whether the ajax.php code is successfully executed or not in inspect - network
// $_FILES is printed because we have uploaded the image also. If not image we can use $_REQUEST also
// print_r($_FILES);
// die;


$action=$_REQUEST['action'];
if(!empty($action)){
    require_once 'partials/User.php';
    $obj=new User();
}

// adding user's action
if($action == 'adduser' && !empty($_POST)){
    $pname=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $photo=$_POST['photo'];

    $playerid=(!empty($_POST['userId']))? $_POST['userId']: "";

    // If my photo is not empty. I am calling the function uploadPhoto from user.php and inserting the data in database.
    $imagename="";
    if(!empty($photo['name'])){
        $imagename=$obj->uploadPhoto($photo);
        $playerData=[
            // first one is database table name
            'name'=> $pname,
            'email'=> $email,
            'phone'=> $phone,
            'photo'=> $imagename,
        ];
    }else{
        $playerData=[
            'name'=> $pname,
            'email'=> $email,
            'phone'=> $phone,
        ];
    }

    $playerid=$obj->add($playerData);

    if(!empty($playerid)){
        $player=$obj->getRow('id', $playerid);
        // the entire things is in array format we should convert this into json so this is the syntax
        echo json_encode($player);
        exit();
    }
}
?>