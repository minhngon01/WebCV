<?php
    require_once('model.php');
    $db_handle = new DBController();
    $username = $_SESSION['username'];
    echo $username;
    $cv_name = $_GET['cv_name'];
    echo $cv_name;

    $sql_query = "DELETE FROM cv WHERE cv_name = '".$cv_name."' AND user = '".$username."'";
    $result = $db_handle->runQuery($sql_query);
    header('location:?page=ViewCVOption');
?>  