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
  <body style="background-color:#beeef9  ;">
       <div class="container p-4">
         <div class="row"  style="margin-left: auto; margin-right: auto;">
            <div class="col-md-10">
                <table class="table table-info table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                        <th scope="col" style="width: 5%;" >Id</th>
                        <th scope="col" style="width: 20%;">First Name</th>
                        <th scope="col" style="width: 20%;">Last Name</th>
                        <th scope="col" style="width: 20%;">Project</th>
                        <th scope="col" style="width: 20%;">Action</th>     
                        </tr>
                    </thead>
                    <tbody>
                            <?php include 'db.php'; 
                                $sql = 'SELECT employees.id, employees.firstName, employees.lastName, projects.ProjectName 
                                FROM employees
                                LEFT OUTER JOIN projects ON employees.project = projects.id
                                ORDER BY employees.id';
                                $result_projects = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result_projects)) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td> 
                                    <td><?php echo $row['firstName'] ?></td>
                                    <td><?php echo $row['lastName'] ?></td>
                                    <td><?php echo $row['ProjectName'] ?></td>
                                    <td>
                                        <a href="update_emplo.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Update</a>                         
                                        <a href="delete_emplo.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>                                
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"> 
                    <form action="create_emplo.php" >
                        <button  type="submit" class="btn btn-lg btn-primary" style="color:white;">Create Employee</button>
                    </form>                                
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show mt-3" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php session_unset();
                    } ?>
              </div>
         </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
