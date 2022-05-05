<?php
function emptyinput($firstname, $surname, $username, $email, $pwd, $confirm_pwd){
    $result = false; 
    if (empty($firstname) || empty($surname) || empty($username) || empty($email) || empty($pwd) || empty($confirm_pwd)) {
        $result = true;
    } 
    
    return $result;
}
function nameValid($surname,$firstname,$username){
    $result = true; 
    if (!preg_match("/^[a-zA-Z]*$/",$surname || $firstname || $username )){
        $result =false;
    } 
    
    return $result;
}
//function firstnameValid($firstname){
//    $result = false; 
//    if (!preg_match("/^[a-zA-Z0-9]*$/", $firstname)){
//        $result = true;
//    } 
//    
 //   return $result;
//}
//function usernameValid($username){
 //   $result = false; 
 //   if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
 //       $result = true;
 //   } 
 //   
 //   return $result;
//}

function emailvalid($email){
    $result = false; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } 
    
    return $result;
}

function validpwd($pwd){ 
    $result =true ; 
     if (!preg_match("/^[a-zA-Z0-9]*$/", $pwd)){
         $result = false;
     } 
     
     return $result;}
    
function pwdmatch($pwd, $confirm_pwd){
    $result = false;
    if($pwd !== $confirm_pwd){
        $result = true;
    }
    return $result;
}

function usernameexist($conn, $username, $email){
    $sql = "SELECT *FROM tbl_users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=detailseist");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createuser ($conn, $surname, $firstname ,$username ,$email, $pwd){   
    $sql = "INSERT INTO tbl_users (null,surname, firstname,  username, email, pwd) values (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=detailseist");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);



    mysqli_stmt_bind_param($stmt, "sssss", $surname, $firstname ,$username , $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.inc.php");
        exit();
}


   $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
       return $row;

    }else{
       $result = false;
       return $result;
   }
   


