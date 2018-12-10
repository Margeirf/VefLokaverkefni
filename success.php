<?php 
require_once('include/head.php');
session_start();
if(!isset($_SESSION['userName'])){
    echo '<script>alert("You need to sign in to access this page");</script>';
    #Header("Location: index.php");
}
?>

<body>
    <p class="username">Welcome 
<?php echo $_SESSION['userName']; ?>
    </p>
</body>