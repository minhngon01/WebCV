<!doctype html>
<html lang="en">
<head>
    <title>Create Your Job Winning Resume</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
	
	
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!--<script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>-->

</head>
<header>
    <h5 id="err_msg" class="caution bg-danger">
        <?php 
            if(isset($_SESSION['err'])){
                echo $_SESSION['err']; 
                $_SESSION['err'] = "";
            }
        ?>
    </h5>
    <h5 id="info_msg" class="message bg-success">
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg']; 
                $_SESSION['msg'] = "";
            }
        ?>  
    </h5>
	<nav class="navbar navbar-expand-md navbar-light bg-light" style="background:  !important;">
        <a class="navbar-brand" href="?page=home_hero">
            <img class="small_icon" src="./imageStatic/BK.png" alt="BK_logo"><div class="text-primary">Simple CV creator</div>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php
                    if($_SESSION['enableDisplay'] == 0){
                        echo "<li class=\"nav-item\">";
                        echo "</li>";
                        echo "<li class=\"nav-item\">";
                        echo "</li>";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=about">Guides</a>
                </li>
                <?php 
                    if($_SESSION['enableDisplay'] == 0){
                        unset($_SESSION['displayname']);
                        echo "<li class=\"nav-item\">";
                        echo    "<a class=\"nav-link\" href=\"?page=Login\">Login</a>";
                        echo "</li>";
                        echo "<li class=\"nav-item\">";
                        echo    "<a class=\"nav-link\" href=\"?page=RegisterForm\">";
                        echo        "<button class=\"btn button\">";
                        echo            "Sign up";
                        echo        "</button>";
                        echo    "</a>";
                        echo "</li>";
                    }
                    else if($_SESSION['enableDisplay'] == 1){
                        echo "<li class=\"nav-item\">";
                        echo    "<a class=\"nav-link\" href=\"?page=FormCV\">Create CV</a>";
                        echo "</li>";
                        if(!empty($_COOKIE['username'])){
                            if($_SESSION['user_role'] <= 1){
                                echo "<li class=\"nav-item\">";
                                echo    "<a class=\"nav-link\" href=\"?page=ViewCVchooseOption\">View CV</a>";
                                echo "</li>";
                            }
                            else {                            
                                echo "<li class=\"nav-item\">";
                                echo    "<a class=\"nav-link\" href=\"?page=ViewCVOption\">View CV</a>";
                                echo "</li>";
                            }
                        }
                        echo "<li class=\"nav-item\">";
                        echo    "<a class=\"nav-link\" href=\"?page=Logout\">Log out</a>";
                        echo "</li>";
                        echo "<li class=\"nav-item text-success text-large\">";
                        echo    $_SESSION['displayname'] ;
                        echo "</li>";                    
                    }
                ?>
            </ul>   
        </div>
	</nav>
</header>
