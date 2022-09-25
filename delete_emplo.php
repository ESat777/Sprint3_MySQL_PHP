<?php

    include 'db.php';

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        
        $sql = "DELETE FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = trim($_GET["id"]);
            
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['message'] = 'Employee removed successfully';
                $_SESSION['message_type'] = 'success';
                header("location: employees.php");
                exit();
            } 
        }
    mysqli_stmt_close($stmt);
} 
?>