<?php

include 'db.php';

if (isset($_POST['ProjectName'])) {

    if(!empty($_POST['ProjectName'])) {
        $projectname = ($_POST['ProjectName']);

        $sql = "INSERT INTO projects (ProjectName) VALUES (?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            $param_name = $projectname;

            if(mysqli_stmt_execute($stmt)){
                $_SESSION['message'] = 'Project created successfully';
                $_SESSION['message_type'] = 'success';
                header("location: index.php"); 
                exit();
            }
        }
        mysqli_stmt_close($stmt);

    } else {
        $_SESSION['message'] = 'Failed! Write the name of the project!';
        $_SESSION['message_type'] = 'danger';
        header("location: create_project.php");
        exit();
    } 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <?php include 'navbar.php';?>
    <title>DBM</title>
  </head>
    <body>
        <div class="container p-4 d-flex justify-content-lg-center">
                <div class="row">
                    <div class="col-lg-12">                
                        <div class="card card-body bg-info" style="min-width:40vw;">
                            <form action="" method="POST" class="text-center">
                                <div class="form-group mb-3">
                                    <label style="color: white;"><h3><strong>Create project</strong></h3></label>
                                    <input type="text" name="ProjectName" class="form-control"  placeholder="* project name" autofocus>
                                </div>
                                <div class=" gap-2">
                                    <input type="submit" class="btn btn-primary btn-block" style="color:white ;" value="Create">
                                    <button onclick="history.back()" type="button" class="btn btn-secondary">Back</button>
                                    <?php if (isset($_SESSION['message'])) { ?>
                                         <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show mt-3" style="width=180vw;"
                                              role="alert"><?= $_SESSION['message'] ?>
                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                                        </div>
                                    <?php session_unset();
                                    } ?>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
         integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
         integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    </body>
</html>