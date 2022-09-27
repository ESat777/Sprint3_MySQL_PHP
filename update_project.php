<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $projectname = $row['ProjectName'];
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $projectname = $_POST['ProjectName'];
    $sql = "UPDATE projects SET ProjectName = '$projectname'  WHERE id = $id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Updated Successfuly';
    $_SESSION['message_type'] = 'success';    
    header("location: index.php");
    exit();
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
    <title>DBM</title>
</head>
<body>
<div class="container p-4 d-flex justify-content-lg-center">
                <div class="row">
                    <div class="col-lg-12">                
                        <div class="card card-body bg-info" style="min-width:40vw;">
                            <form action="" method="POST" class="text-center">
                                <div class="form-group mb-3">
                                    <label style="color: white;"><h3><strong>Rename project</strong></h3></label>
                                    <input type="text" name="ProjectName" value="<?php echo $projectname; ?>" class="form-control" placeholder="Rename project">
                                </div>
                                <div class=" gap-2">
                                    <button class="btn btn-primary mt-3" name="update">Update</button>
                                    <button onclick="history.back()" type="button" class="btn btn-secondary mt-3">Back</button>
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
