<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Users</title>
</head>
<body>
<?php include 'links.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Add New User</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_POST['save_user'])){
                            $username =htmlspecialchars($_POST['username'],ENT_QUOTES);
                            $password =sha1($_POST['password']);
                            $role =$_POST['role'];

                            $query = mysqli_query($dbcon, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");

                            if($query){
                                echo '<div class="alert alert-success">User Created!</div>';
                            }else{
                                echo '<div class="alert alert-danger">Error creating user.</div>';
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Cashier">Cashier</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="save_user" value="Save User" class="btn btn-primary">
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="text-primary">System Users</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $get_users = mysqli_query($dbcon, "SELECT * FROM users");
                                while($row = mysqli_fetch_array($get_users)){
                                    echo '<tr>
                                    <td>'.$row['username'].'</td>
                                    <td>'.$row['role'].'</td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>

                <script src="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>