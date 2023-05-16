<?php
require_once("config.php");
session_start();

if(isset($_POST["btn"])){

    $email = $_POST["email"];
    $password = $_POST["password"];


    $select_query = "SELECT * FROM `form table` WHERE email = '$email' and 'password' = '$password'";
    $run_checklogin = mysqli_query($connect,$select_query);
    $check_email = mysqli_num_rows($run_checklogin);


    if($check_email ==0){
        echo "<script>
        alert ('invalid credential')
        window.location.href='login.html'
        </script>";
    }
    else{
        header("location:index.php");
        $meriarray = mysqli_fetch_array($run_checklogin);
        $_SESSION["Username"] = $meriarray[1];
    }
}
else{
    header("location:login.html");
}
?>