<?php
require_once ('config.php');
if(isset($_POST["btn"])) {
$Username = $_POST["Username"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];

$check_email_query = "SELECT * FROM `form table` WHERE email = '$email' and phone = '$phone'";
$run_check_query = mysqli_query($connect,$check_email_query);
$kitne_email_he = mysqli_num_rows($run_check_query);


if($kitne_email_he >0){?>
<script>

alert("email already exist");
window.location.href="form.html";


</script>
<?php


} else{
    $insert_query = "INSERT INTO `form table`(`Username`, `email`, `password`, `phone`) VALUES
    ('$Username', '$email', '$password', '$phone')";
    $execute_insert = mysqli_query ($connect,$insert_query); 


if($execute_insert == true){
    echo "<script>
    alert('data register successfully')
    window.location.href = 'form.html'
    </script>";
}
else{
    echo "<script>
    alert('data not registar successfully')
    window.location.href = 'form.html'
    </script>";
}

}


}else{
    header("location: form.html");
}

?>
