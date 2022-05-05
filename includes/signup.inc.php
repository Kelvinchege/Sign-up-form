<?php
if(isset($_POST["submit"])){

    $firstname =$_POST["firstname"];
    $surname =$_POST["surname"];
    $username =$_POST["username"];
    $email =$_POST["email"];
    $pwd =$_POST["pwd"];
    $confirm_pwd =$_POST["confirm_pwd"];
     require_once 'functions.inc.php';
     require_once 'dbh.inc.php';

     if(emptyinput($firstname, $surname, $username,$email, $pwd,$confirm_pwd) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
     }
     if(nameValid($surname, $firstname,$username) !== false)
     {
        header("location: ../signup.php?error=invalidinpit");
        exit();
     }
     if(emailvalid($email) !== false)
     {
        header("location: ../signup.php?error=invalidemail");
        exit();
     }
     if(validpwd($pwd) !== false)
     {
        header("location: ../signup.php?error=weakpassword");
        exit();
     }
     if(pwdmatch($pwd, $confirm_pwd) !== false)
     {
        header("location: ../signup.php?error=passworddontmatch");
        exit();
     }

     if(usernameexist($conn, $username, $email) !== false)
     {
        header("location: ../signup.php?error=usernamealreadyexist");
        exit();
     }
     createuser ($conn, $surname, $firstname ,$username ,$email, $pwd, $confirm_pwd);
     header("location: ../welcome.php");

}else
{
    header("location: ../signup.php");
    exit();
}