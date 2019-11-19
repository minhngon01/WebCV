<div class = "home-hero-container">
    <div class = "home-hero-main">
        <div class = "home-hero-maincontent">
            <h1 class="home-hero-title">Only 2% of resumes make it past the first round. Be in the top 2%</h1>
            <p class="home-hero-subtitle">Use professional field-tested resume templates that follow
            the exact ‘resume rules’ employers look for. Easy to use &amp; done within minutes
            - try now for free!</p>
            <div class="home-hero-cta">
                <?php
                    if($_SESSION['enableDisplay'] == 0){
                        echo "<div class=\"home-hero-button\">";
                        echo    "<a class=\"home-button button\" href=\"?page=Login\">Create My Resume</a>";
                        echo "</div>";
                    }
                ?>
            </div>
            <img class = "hero-resume-image" src = "./imageStatic/hero-resume.png"> <img/>
        </div>
        
    </div>
</div>

