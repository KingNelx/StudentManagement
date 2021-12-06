
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student Management</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" required placeholder = "First Name" name = "firstName">
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" required placeholder = "Last Name" name = "lastName">
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" class="form-control" required placeholder = "Course" name = "studentCourse">
            </div>

            <div class="mb-3">
                <label class="form-label">Year level</label>
                <input type="text" class="form-control" required placeholder = "Year Level" name = "yearLevel">
            </div>

            <div class="mb-3">
                <label class="form-label">Major</label>
                <input type="text" class="form-control" required placeholder = "Major" name = "major">
            </div>

            <div class="mb-3">
                <label class="form-label">Avatar</label>
                <input type="file" class="form-control" required placeholder = "Avatar" name = "avatar">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required placeholder = "email" name = "email">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" required placeholder = "Password" name = "password">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>

        </form>
    </div>
</body>

</html>


<?php

    require_once 'connect.php';
    $studentID =$_GET['id'];
    if(isset($_POST['submit'])){
        $firstName = mysqli_real_escape_string($connect, $_REQUEST['firstName']);
        $lastName = mysqli_real_escape_string($connect, $_REQUEST['lastName']);
        $studentCourse = mysqli_real_escape_string($connect, $_REQUEST['studentCourse']);
        $yearLevel = mysqli_real_escape_string($connect, $_REQUEST['yearLevel']);
        $major = mysqli_real_escape_string($connect, $_REQUEST['major']);
        $avatar = mysqli_real_escape_string($connect, $_REQUEST['avatar']);
        $email = mysqli_real_escape_string($connect, $_REQUEST['email']);
        $password = mysqli_real_escape_string($connect, $_REQUEST['password']);
        $encrypted = md5($password);
        
        $sql = "UPDATE studentLists SET firstName = '$firstName', lastName = '$lastName', studentCourse = '$studentCourse', studentYear = '$yearLevel', studentMajor = '$major', studentAvatar = '$avatar', 
        email = '$email', password = '$encrypted' WHERE studentID = $studentID";

         $result = mysqli_query($connect, $sql);

         if(!$result){
            die(mysqli_error($connect));
         }else{
             header('location: read.php');
         }
    }

    mysqli_close($connect);
?>
