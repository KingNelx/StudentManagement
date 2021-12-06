<?php
    require_once 'connect.php';

    $studentID = $_GET['id'];
    if(isset($_GET['id'])){

        $sql = "DELETE FROM studentLists WHERE studentID = $studentID";
        $result = mysqli_query($connect, $sql);

        if(!$result){
            die(mysqli_error($connect));
        }else{
            header('location: read.php');
        }
    }   
    mysqli_close($connect);
?>
