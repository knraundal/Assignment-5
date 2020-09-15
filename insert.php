<?php
$servername = "localhost";
$username = "id14867264_root";
$password = "LS1RWp}V%((*<PGY";
$database = "id14867264_tourists_details";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry unable to connect");
}
$insert = false;
$delete = false;
$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $email = $_POST['editemail'];
        $sql = "UPDATE `tourists` SET `email` = '$email ' WHERE `tourists`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        $update = true;
        
    } else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $city = $_POST['city'];
        $describe = $_POST['state'];



        $sql = "INSERT INTO `tourists` ( `name`, `email`,`mobile`, `city`,`state`) 
                VALUES ('$name', '$email','$mobile', '$city','$state');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `tourists` WHERE `sno` = $sno";
    $result = mysqli_query($conn,$sql);
    $delete = true;

}

if ($insert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong>YOUR DETAILS ARE SUBMITTED!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
if ($update) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>UPDATED!</strong> YOUR DETATILS ARE UPDATED!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if ($delete) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DELETED!</strong> Your DETAILS ARE DELETED!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
include('index.php');
