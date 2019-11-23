<?php
    $connect = mysqli_connect("localhost", "root", "root", "assignment");
    if(isset($_POST["user_name"]))
    {
        $username = $_POST["user_name"];
        $query = "SELECT * FROM user_info WHERE username = '".$username."'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        if($row > 0){
            echo "<span class='status-not-available'> Username Not Available.</span>";
        }
        else {
            echo "<span class='status-available'> Username Available.</span>";
        }
    }
    exit();
?>