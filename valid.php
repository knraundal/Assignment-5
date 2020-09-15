<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    if (strlen($name) <= 3) {
        $name_error = 'Name must contain more than 3 character';
    }
    
    if (!preg_match("/^[6-9]{1}[0-9]{9}$/i", $mobile)) {
        $mobile_error = "Please enter a valid phone number";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }
    if (strlen($state) == 0) {
        $state_error = 'state name is required';
    }
    if(strlen($city) <=3){
        $city_error = 'City name must contain more than 3 character';
    }
    
    if((strlen($name) <= 3) OR (!preg_match("/^[6-9]{1}[0-9]{9}$/i", $mobile)) OR
     (!filter_var($email, FILTER_VALIDATE_EMAIL)) OR (strlen($state) == 0) OR (strlen($city) <= 3)){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> Something went wrong
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>'; 
        include('index.php');
    }
    else{
        include('insert.php');
    }

