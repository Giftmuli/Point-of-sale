<?php include 'dbcon.php'; ?>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">

    <?php
    if(isset($_SESSION['username'])){
        echo '<li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
        <a class="nav-link" href="sale.php">Sale</a>
      </li>';
    }
    ?>
     
     <?php

     if (isset($_SESSION['username']) && $_SESSION['role'] == 'Admin') {

         echo '<li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user.php">Users</a>
              </li>';
     }
      ?>

      <?php
      if (isset($_SESSION['username'])) {
          echo '
               <li class="nav-item">
                <a class="nav-link" href="#">Hello,'.$_SESSION['username'].'</a>
              </li>;
          
          
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
              </li>';
      }
      
      else {
          echo '<li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>';
      }
      ?>

    </ul>
  </div>
</nav>

