<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql1 = "SELECT * FROM employees WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_array($result1);
        $firstname = $row['firstName'];
        $lastname = $row['lastName'];
        $projectname = $row['project'];
    }
} 

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $projectname = $row['project'];
   
    if (empty($_POST['ProjectName'])) {
        
        $sql1 = "UPDATE employees SET firstName ='$firstname', lastName = '$lastname' WHERE id = $id";
        $result = mysqli_query($conn, $sql1);
        if (!$result){
            die("Query filed");
        }

        $_SESSION['message'] = 'Updated Successfuly';
        $_SESSION['message_type'] = 'warning';
        header("location: employees.php");
        exit();
        
    }  else {
        $projectname= $_POST['ProjectName'];
        $sql2 = "UPDATE employees SET project = '$projectname' WHERE id = $id";
        $result1 = mysqli_query($conn, $sql2);
        if (!$result1){
            die("Query filed");
        }

        $_SESSION['message'] = 'Updated Successfuly';
        $_SESSION['message_type'] = 'warning';
        header("location: employees.php"); 
        exit();
    }           
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <?php include 'navbar.php';?>
    <title>Document</title>
</head>
<body>
<div class="container p-4 d-flex justify-content-lg-center">
        <div class="row">
            <div class="col-md-4">
               
                <div class="card card-body bg-info" style="min-width:40vw;">
                    <form action="" method="POST">
                        <div class="form-group mb-4 text-center">
                            <label style="color: white;"><h3><strong>Update Employee Information</strong></h3></label>
                            <input type="text" name="firstName" value="<?php echo $firstname; ?>" class="form-control" placeholder="* first name" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="lastName" value="<?php echo $lastname; ?>" class="form-control" placeholder="* last name" autofocus>
                        </div>
                        <div  class=" mt-4 text-center">
                        <label for="ProjectName" style="color:white; font-weight: 700; font-size:20px">* Set project:</label><br>
                        <select name="ProjectName"  style="min-width:37vw ;">
                            <option value="0"  class="mt-5"><?php echo $projectname; ?></option>
                            
                            <?php
                                $sql = 'SELECT * FROM projects';
                                $result_projects = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result_projects)) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['ProjectName'] ;?></option>
                                <?php } ?>
                        </select>
                    </div> 
                        <div class="text-center gap-2">
                            <input type="submit" class="btn btn-primary mt-3  btn-block" name="submit" value="Update">
                            <button onclick="history.back()" type="button" class="btn btn-secondary mt-3">Back</button>
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show mt-3" style="width=180vw;" role="alert">
                            <?= $_SESSION['message'] ?>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                                </div>
                            <?php session_unset();
                            } ?>
                        </div>
                    </form>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
     integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
     integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
</body>
</html>
