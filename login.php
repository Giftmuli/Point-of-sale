<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Point of sale</title>
</head>
<body>
<?php include 'links.php'; ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
        <h3>Login</h3>
        </div>
        <div class="card-body">
            <?php
            if(isset($_POST['login'])){
                $username=htmlspecialchars($_POST['username'],ENT_QUOTES);
                $password=sha1($_POST['password']);
                $user=mysqli_query($dbcon,"SELECT * FROM users WHERE username='$username' AND password='$password'");
                if(mysqli_num_rows($user)>0)
                    {
                        $row=mysqli_fetch_array($user);
                        $_SESSION['username']=$row['username'];
                        $_SESSION['role']=$row['role'];
                        header('location:index.php');
                    }
                    else{
                        echo '<div class="text-danger">Invalid username or password.</div>';
                    }
            }

            ?>
            <form method="post">
                <div class="mb-3">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 d-grid">
                    <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
                </div>
            </form>
</div>
    
</body>
</html>