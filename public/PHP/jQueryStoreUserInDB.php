<?php

use App\Models\Teachers_model;
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$userModel = new Teachers_model();
$data = [
    'firstname'     => $firstname,
    'lastname'     => $lastname,
    'email'    => $email,
];
$userModel->save($data);