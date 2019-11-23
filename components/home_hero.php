

<div class = "home-hero-container" style = "background-color: white;">
    <div class = "home-hero-main">
        <div class = "home-hero-maincontent">
            <h1 class="home-hero-title">Only 2% of resumes make it past the first round. Be in the top 2%</h1>
            <p class="home-hero-subtitle">Use professional field-tested resume templates that follow
            the exact ‘resume rules’ employers look for. Easy to use &amp; done within minutes
            - try now for free!</p>
            <div class="home-hero-cta">
                 
                <?php if(isset($_SESSION['username'])): ?>
                    <a class="home-button button" href="?page=FormCV">Create My Resume</a>  
                <?php else: ?>
                    <a class="home-button button" href="?page=Login">Create My Resume</a> 
                <?php endif; ?>
            </div>
            <img class = "hero-resume-image" src = "./imageStatic/hero-resume.png"> <img/>
        </div>     
    </div>
</div>


