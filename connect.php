<?php

    $connect = new mysqli ('localhost:3309', 'root', '', 'student');

    if(!$connect){
        echo 'Error' . mysqli_error($connect);
    }

?>
