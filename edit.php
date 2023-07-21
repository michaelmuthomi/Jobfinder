<?php
include 'dbcon.php';

if (isset($_POST['submit_message'])) {
    $id = $_POST['id'];
    $newEmail = $_POST['email'];
    $newMessage = $_POST['message'];

    $sql = "UPDATE skills SET title = '$newEmail', description = '$newMessage' WHERE id = $id";
    if (mysqli_query($dbconn, $sql)) {
        header("Location: adminpanel");
    } else {
        echo "Error updating record";
    }
}
if (isset($_GET['message']))  {

    $id = $_GET['id'];

    $sql = "DELETE FROM messages WHERE id = $id";
    
    if (mysqli_query($dbconn, $sql)) {
        echo 'Worked';
        header("Location: adminpanel");
    } else {
        echo "Error updating record";
    }
}
if (isset($_GET['skill']))  {

    $id = $_GET['id'];

    $sql = "DELETE FROM skills WHERE id = $id";
    
    if (mysqli_query($dbconn, $sql)) {
        echo 'Worked';
        header("Location: adminpanel");
    } else {
        echo "Error updating record";
    }
}
if (isset($_GET['credentials']))  {

    $id = $_GET['id'];

    $sql = "DELETE FROM credentials WHERE id = $id";
    
    if (mysqli_query($dbconn, $sql)) {
        echo 'Worked';
        header("Location: adminpanel");
    } else {
        echo "Error updating record";
    }
}
if (isset($_GET['admin']))  {

    $id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE id = $id";
    
    if (mysqli_query($dbconn, $sql)) {
        echo 'Worked';
        header("Location: adminpanel");
    } else {
        echo "Error updating record";
    }
}
?>
