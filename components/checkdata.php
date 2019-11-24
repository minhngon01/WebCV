<?php
    require_once('model.php');
    $db_handle = new DBController();
    if(isset($_POST["user_name"]))
    {
        $username = $_POST["user_name"];
        $sql_query = "SELECT * FROM user_info WHERE username = '".$username."'";
        $result = $db_handle->runQuery($sql_query);
        $row = $db_handle->numRows($sql_query);
        if($row > 0){
            echo "<div class='status-not-available text-danger'> Username Not Available.</div>";
        }
        else {
            echo "<div class='status-available text-success' > Username Available.</div>";
        }
    }
    exit();
?>