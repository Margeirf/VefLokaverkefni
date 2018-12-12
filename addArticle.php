<html>
<?php require_once('include/head.php');
session_start();
if(!isset($_SESSION['userName'])){
    #echo '<script>alert("You need to sign in to access this page");</script>';
    #echo '<meta http-equiv="refresh" content="0; url=index.php" />';
}    
?>
    
  <body>
<?php require_once('include/header.php'); ?>
    <div class="container">

      <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="form-signin-heading">Write an article</h2>
        <label for="articleTitle" class="sr-only">Article Title</label>
        <input type="name" id="articleTitle" class="form-control" placeholder="Article Title" name="articleTitle" required autofocus> 
        <textarea class="form-control" id="articleContent" name="articleContent" placeholder="Article Content"></textarea>
        <div class="checkbox">
            <label>
                Do you want to 
          <a href="index.php" class="link">Cancel</a>
                this article
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
        
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
require_once("include/dbConn.php");
    $DBconnect=DBconnectUsers('write');

    $articleTitle = $_POST['articleTitle'];
    $articleContent = $_POST['articleContent'];
    $author = $_SESSION['userName'];
    $date = date("d.m.Y") . "";

        $stmt = $DBconnect->prepare("INSERT INTO articles (title, content, date, author) 
        VALUES(:title, :content, :date, :author)");
        $stmt->bindParam(':title', $articleTitle);
        $stmt->bindParam(':content', $articleContent);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':date', $date);

        $stmt->execute();
        header("Location: index.php");
}//isset
?>