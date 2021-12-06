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
  <button class = " btn btn-success my-5"> <a href="create.php" class="text-light text-decoration-none"> Enroll New Student</a> </button>
  <table table class="table table-striped table-hover table-bordered text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Student Course</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        require_once 'connect.php';
        $sql = "SELECT * FROM studentLists";
        $result = mysqli_query($connect, $sql);

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $studentCourse = $row['studentCourse'];
            $email = $row['email'];

            echo '<tr>
                <th scope="row">'. $row['studentID'].'</th>
                <td>'. $firstName.'</td>
                <td>'. $lastName.'</td>
                <td>'. $studentCourse.'</td>
                <td>'. $email.'</td>
                <td>
                <button class="btn btn-primary"> <a href="update.php?id='.$row['studentID'].'" class="text-light text-decoration-none">UPDATE </a>  </button>
                <button class="btn btn-danger">  <a href="delete.php?id='.$row['studentID'].'"class="text-light text-decoration-none">DELETE </a>  </button>
                <button class="btn btn-info">  <a href="search.php?id='.$row['studentID'].'"class="text-light text-decoration-none">More Details </a>  </button>
                </td>
                </tr>';
          }
        }else{
           echo "NO DATA FOUND IN DATABASE OR NO MATCHING QUERY WERE FOUND ";
        }

        mysqli_close($connect);
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
