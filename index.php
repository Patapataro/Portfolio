<?php include 'header.php'; ?>
<body>
    <div class="container">
        <header id="main-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-column">
                        <div class="p-5 bg-dark text-white">
                            <div class="name">
                                <h1 class="name display-4 font-weight-bold color-white ">Patrick Flores</h1>
                                <p>Software Developer</p> 
                            </div>
                        </div>
                        <div class="p-4 bg-black">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="download/resume.pdf" download="PatrickFlores-Resume.pdf" class="btn btn-outline-light">    
                                        Download Resume
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <div id="menu" class="d-flex flex-row">
                                <!-- <div class="menu-section d-flex flex-row text white align-items-stretch text-center"> -->
                                    <!-- <div id="home-btn" class="port-item p-4 bg-primary" data-toggle="collapse" data-target="#home">
                                        <i class="tabs fa fa-home d-block"></i> Home
                                    </div> -->

                                <!-- </div> -->
                                <div class="menu-section d-flex flex-row text white align-items-stretch text-center">
                                    <div class="color-black port-item p-4 bg-success" data-toggle="collapse" data-target="#resume">
                                        <!-- <i class="tabs fa fa-graduation-cap d-block"></i>  -->
                                        <svg width="25" height="25" fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z"/>
                                        </svg>
                                        <br>
                                        RESUME
                                    </div>
                                    <div class="color-black port-item p-4 bg-warning" data-toggle="collapse" data-target="#work">
                                        <!-- <i class="tabs fa fa-folder-open d-block"></i>  -->
                                        <svg width="25" height="25" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                            <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
                                        </svg>
                                        <br>
                                        PORTFOLIO
                                    </div>
                                    <div class="color-black port-item p-4 bg-danger" data-toggle="collapse" data-target="#contact">
                                        <!-- <i class="tabs fa fa-envelope d-block"></i>  -->
                                        <svg width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                        <br>
                                        CONTACT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- HOME -->
        <!-- <div id="home" class="collapse show">
            <div class="card card-body bg-primary text-white py-5">
                <h2 class="color-white">Welcome to my page</h2> -->
                <!-- <p class="lead">I'm a web developer</p> -->
            <!-- </div>
            <div class="card card-body py-5">
                <h3>My Skills</h3>
                <p>These are my top five favorite languages.</p>
                <hr>
                <h4>HTML</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width:100%;"></div>
                </div>
                <h4>CSS</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width:100%;"></div>
                </div>
                <h4>JavaScript</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width:90%;"></div>
                </div>
                <h4>PHP</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width:100%;"></div>
                </div>
                <h4>Python</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width:85%;"></div>
                </div>
            </div>
        </div> -->
    
        <!-- RESUME -->
        <div id="resume" class="collapse">
            <div class="card card-body bg-success py-5 color-white">
                <h3>Where I've worked</h3>
            </div>
            
            <div class="card card-body py-5">
                <!-- <h3>Where have I worked?</h3> -->
                <p> </p>
                <div class="card-deck">
                 <div class="row">
                 <div class="col-lg-4 col-md-6">
                     <div class="card">
                        <div class="card-body">
                            <h4 class="card-tittle">Abracon LLC</h4>
                            <p class="card-text">Developed software systems as part of Abracon's operations team with focus on increasing business efficiency.</p>

                                
                            <p class="p-2 mb-3 bg-dark text-white">
                                Position: Software Developer
                            </p>
                        
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">Dates: 2019 January - 2022 June</div>
                        </div>
                      </div>
                    </div>
                   <div class="col-lg-4 col-md-6">
                     <div class="card">
                        <div class="card-body">
                            <h4 class="card-tittle">Software Developer</h4>
                            <p class="card-text">I've worked on many different web apps. Check out my work page to see what I can do.</p>
                            <p class="p-2 mb-3 bg-dark text-white">
                                Position: Contractor/Freelancer
                            </p>
                            <!-- <p class="p-2 mb-3 bg-dark text-white">
                                Phone: (512)210-1046
                            </p> -->
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">Dates: 2016 - 2019</div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6">
                      <div class="card">
                        <div class="card-body">
                            <h4 class="card-tittle">General Motors/Alorica </h4>
                            <p class="card-text">I trouble shooted touchscreen radios for all GM systems.</p>
                            <p class="p-2 mb-3 bg-dark text-white">
                                Position: Infotainment Specialist
                            </p>
                            <p class="p-2 mb-3 bg-dark text-white">
                                Phone: (866)256-7422
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">Dates: 2018 April – 2018 June</div>
                        </div>
                      </div>
                     </div> -->
                    <div class="col-lg-4 col-md-6">
                      <div class="card">
                        <div class="card-body">
                            <h4 class="card-tittle">Web.com</h4>
                            <p class="card-text">I consulted a range of different business owners from Attorneys to Architects. I advised in (SEO, Google AdWords, Dynamic Websites).</p>
                            <p class="p-2 mb-3 bg-dark text-white">
                                Position: Digital Consultant
                            </p>
                            <p class="p-2 mb-3 bg-dark text-white">
                                Phone: (877)821-9023
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">Dates: 2017 Dec – 2018 Feb</div>
                        </div>
                    </div>
                  </div>
                </div>
             </div>
            </div>
        </div>
        
        <!-- WORK -->
        <div id="work" class="collapse show">
            <div class="card card-body bg-warning py-5 color-black">
                <!-- <h2>My Portfolio</h2> -->
                <h3>What I've Built</h3>
            </div>
            
            <!-- <div class="card card-body py-5">
                <h3>What have I built?</h3>
                <p>These are some of the applications I've built.</p>
            </div> -->
            <div class="card-deck">
                <div class="card">
                    <a href="work/paluxe">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/paluxe.JPG" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Palux</h4>
                        <p class="card-text">A ladning page that talks about a book and its authors.</p>
                        <p class=" p-2 mb-3 bg-dark text-white">
                        Bootstrap CSS Framework
                        </p>
                    </div>
                </div>
                <div class="card">
                    <a href="work/avantLoop">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/avant_loop.JPG" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Avant Loop</h4>
                        <p class="card-text">A social media sign up page.</p>
                        <p class=" p-2 mb-3 bg-dark text-white">
                        Bootstrap CSS Framework 
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <a href="work/cms_mvc">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top image-fade" src="img/cms.jpg" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">Click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Content Management System</h4>
                        <p class="card-text">This is a CMS for bloggers. It has a backend to manage the posts, comments users and categories. </p>
                        <p class=" p-2 mb-3 bg-dark text-white">
                        PHP, JavaScript and Bootstrap CSS Framework for the UI.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <a href="work/githubfinder">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/github.jpg" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">GitHub Finder</h4>
                        <p class="card-text">Github Finder allows you to fetch information on Github users using the GitHub API.</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                        JavaScript, Github API and Bootswatch for the UI.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <a href="work/booklist">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/booklist.jpg" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Book List</h4>
                        <p class="card-text">Book List is perfect for libraries and is also linked to your local storage in the browser.</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                        JavaScript and Skeleton for the UI.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <a href="work/loancalculator">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/loancalc.jpg" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Loan Calculator</h4>
                        <p class="card-text">Loan Calculator compounds a loan biyearly and gives you the interest.</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                        JavaScript and Bootstrap CSS Framework for the UI.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <a href="work/tasklist">
                        <div class="container-fade">
                            <img class="img-fluid card-img-top" src="img/tasklist.jpg" alt="Card image cap" height="267" width="267">
                            <div class="overlay-fade">
                                <div class="text-fade">click Me</div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-tittle">Task List</h4>
                        <p class="card-text">Task List uses Local Storage to save tasks after the user has closed the browser.</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                        JavaScript and Materialize for the UI.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CONTACT -->
        <div id="contact" class="collapse">
            <div class="card card-body bg-danger text-white py-5">
                <h3>Get in touch</h3>
            </div>
            
            <div class="card card-body py-5">
                <!-- <h3>Get in touch</h3> -->
                <!-- <p></p> -->
                <form method="post">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <!-- <span class="input-group-addon bg-danger text-white">
                                <i class="fa fa-user"></i>
                            </span> -->
                            <input type="text" class="form-control bg-dark text-white" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <!-- <span class="input-group-addon bg-danger text-white">
                                <i class="fa fa-envelope"></i>
                            </span> -->
                            <input type="email" class="form-control bg-dark text-white" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <!-- <span class="input-group-addon bg-danger text-white"> 
                                <i class="fa fa-pencil"></i>
                            </span> -->
                            <textarea rows="3" class="form-control form-control-lg bg-dark text-white message-box" name="body" placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn btn-danger btn-block btn-lg">
                </form>
            </div>
        </div>
    
    <!-- FOOTER -->
    <footer id="main-footer" class="p-5 bg-dark text-white">
    </footer>
  </div>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="vendor/bootstrap/js/jquery.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/lightbox.js"></script>
<script src="vendor/bootstrap/fontawesome/js/fontawesome.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
<script src="vendors/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script> -->
<script>
$('.port-item').click(function() {
    $('.collapse').collapse('hide');
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
<script src="js/controler.js"></script>
<?php include "controler.php"; ?>
</body>
</html>