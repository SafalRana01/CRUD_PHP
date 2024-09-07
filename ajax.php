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
    $pname = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Correct way to handle files
    $image = (!empty($_FILES['photo'])) ? $_FILES['photo'] : null;

    $playerid = (!empty($_POST['userId'])) ? $_POST['userId'] : "";

    // If my photo is not empty
    $imagename = "";
    if(!empty($image['name'])){
        $imagename = $obj->uploadPhoto($image);  // This calls the upload function
        $playerData = [
            'name' => $pname,
            'email' => $email,
            'phone' => $phone,
            'image' => $imagename,
        ];
    } else {
        $playerData = [
            'name' => $pname,
            'email' => $email,
            'phone' => $phone,
        ];
    }

    $playerid = $obj->add($playerData);  // Assuming the add function works properly

    if(!empty($playerid)){
        $player = $obj->getRow('id', $playerid);
        echo json_encode($player);
        exit();
    }
}

?>