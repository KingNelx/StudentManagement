<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student Management System</title>
</head>

<body>
    <div class="container my-5">
        <table class="table table-striped table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year</th>
                    <th scope="col">Major</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
            
                </tr>
            </thead>
            <tbody>

                <?php

                require_once 'connect.php';

                $searchID = $_GET['id'];
                $sql = "SELECT * FROM studentLists WHERE studentID = $searchID";
                $result = mysqli_query($connect, $sql);

                if (!$result) {
                    die(mysqli_error($connect));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {

                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $studentCourse = $row['studentCourse'];
                    $studentYear = $row['studentYear'];
                    $studentMajor = $row['studentMajor'];
                    $studentAvatar = $row['studentAvatar'];
                    $email = $row['email'];
                    $password = $row['password'];
                        echo '
                <tr>
                <th scope="row">'.$row['studentID'].'</th>
                <td>'.$firstName.'</td>
                <td>'.$lastName.'</td>
                <td>'.$studentCourse.'</td>
                <td>'.$studentYear.'</td>
                <td>'.$studentMajor.'</td>
                <td>'.$studentAvatar.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                </tr>';
                    }
                }
                mysqli_close($connect);
                ?>
            </tbody>
        </table>

        <button class = "btn btn-primary"> <a href="read.php" class="text-light"> Go Back </a></button>
    </div>
</body>

</html>
