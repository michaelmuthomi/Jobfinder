<?php
session_start();
$_SESSION['contact_user_firstname'] = $_GET['firstname'];
$_SESSION['contact_user_lastname'] = $_GET['lastname'];
$_SESSION['contact_user_contact'] = $_GET['contact'];
$_SESSION['contact_user_email'] = $_GET['email'];
$_SESSION['contact_user_image'] = $_GET['image'];
$_SESSION['contact_user_skill'] = $_GET['skill'];

header("Location: viewprofile");

?>