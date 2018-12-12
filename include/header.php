    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Lokaverkefni MFP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
        <?php
        
        if(isset($_SESSION['userName'])){
            echo '<script>console.log("'.$_SESSION['userName'].'");</script>';
            echo '<li class="nav-item">
        <a class="nav-link" href="addArticle.php">Add Atricle</a>
        </li>';
            echo '<li class="nav-item">
        <a class="nav-link" href="signout.php">Sign out</a>
        </li>';
        }
        ?>
  </div>
</nav>
