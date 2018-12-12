<html>
<?php require_once('include/head.php'); 
    session_start();
    ?>
<body>
<?php require_once('include/header.php'); ?>
<div class="articleContainer">
<?php
include 'include/dbConn.php';
$DBconnect = DBconnectUsers('read');
$getData = "SELECT * FROM articles";
$res = $DBconnect->query($getData);

 if(!is_null($res)){
        foreach($res as $row){
            echo '<div class="article">
                    <h2 class="articleTitle">' . $row['title'] . '</h2>
                    <p class="content">' . $row['content'] . '</p> 
                    <p class="date">' . $row['date'] . '</p>
                    <H4 class="author">' .$row['author'] . '</H4>
                  </div>';
        }
        echo "</form>";
}//enda if
?>
        </div>
</body>
</html>