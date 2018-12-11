<?php require_once("includes/menu.php");?>
    <!--display table-->
    <?php
    include 'DBconnect/connection.php';
    $DBconnect = DBconnectProjects();
    $getData = "SELECT id, userName, projectName, projectDescription, projectDeadline FROM projects WHERE userName='$userName' AND projectStatus=true";
    $res = $DBconnect->query($getData);
    if(isset($_POST['add'])){   
    $stmt = $DBconnect->prepare("INSERT INTO projects(userName, projectName, projectDescription, projectDeadline, projectStatus)
    VALUES(:userName, :projectName, :projectDesc, :projectDeadline, :projectStatus)");
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':projectName', $projectName);
    $stmt->bindParam(':projectDesc', $projectDesc);
    $stmt->bindParam(':projectDeadline', $projectDeadline);
    $stmt->bindParam(':projectStatus', $status, PDO::PARAM_BOOL);
    
    $projectName = $_POST['projectName'];
    $projectDesc = $_POST['projectDesc'];
    $projectDeadline = date("Y-m-d",strtotime($_POST['projectDeadline']));
    $status = true;
    $stmt->execute();
    echo '<meta http-equiv="refresh" content="1">';
    }
    echo '<div class="spacer">
    <body>
    <div class="tableContainer">
    <table class="MainTable" align="center">
        <tr class="TitleRow">
            <th class="TitleColumn">User</th>
            <th class="TitleColumn">Project</th>
            <th class="TitleColumn">Description</th>
            <th class="TitleColumn">Deadline</th>
            <form method="post" action="projectsEdit.php">
            <th class="TitleColumn">Edit</th>
        </tr>';
    if(!is_null($res)){
                //echoa hverja röð fyrir sig
        foreach($res as $row){
            echo '<tr class="ContentRow">
                    <td class="ContentColumn">' . $userName . '</td>
                    <td class="ContentColumn">' . $row['projectName'] . '</td>
                    <td class="ContentColumn">' . $row['projectDescription'] . '</td>
                    <td class="ContentColumn">' . $row['projectDeadline'] . '</td>
                    <td class="ContentColumn"><button type="submit" title="Edit" name="data[]" value="' . $row['id'] . '">Edit</button></td>
                  </tr>';
        }
        echo "</form>";
    }//enda if
    
    else{
        echo "No projects found";
    }
    echo '<tr class"ContentRow">
            <td class="ContentColumn"></td>
            <form method="post">
                <td class="ContentColumn"><input type="text" name="projectName" placeholder="Project Name" class="projectName"></td>
                <td class="ContentColumn"><textarea name="projectDesc" placeholder="Project Description" class="projectDesc"></textarea></td>
                <td class="ContentColumn"><input type="date" name="projectDeadline" class="deadLine"></td>
                <td class="ContentColumn"><input type="submit" name="add" value="Add Project" class="projectAdd"></td>
            </form>
        </tr>';
    echo "</table>
    </div></body>";
       
       
       
       
       
    $projectName = null;
    $projectDesc = null;
    $projectDeadline = null;
    $DBconnect = null;
    
    
    
    
    ?>
<?php require_once("includes/footer.php");?>
<?php require_once("includes/footer.php");?>