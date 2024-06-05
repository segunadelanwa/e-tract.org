<!doctype html>
<html lang="en">
<head>
<?php

include("config.php");
$loader = new Loader;

?>


    <meta charset="utf-8" />
    <title> Christ Cornerstone Society Free E-Tract </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css" /> 
    <link rel="stylesheet" href="css/slick.css" type="text/css" />   
    <link rel="stylesheet" href="css/tooplate-simply-amazed.css" type="text/css" />
<!--

Tooplate 2123 Simply Amazed

https://www.tooplate.com/view/2123-simply-amazed

-->
</head>

<body>
    <div id="outer">
        <header class="header order-last" id="tm-header">
            <nav class="navbar">
                <div class="collapse navbar-collapse single-page-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#section-1"><span class="icn"><i class="fas fa-2x fa-air-freshener"></i></span> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-2"><span class="icn"><i class="fab fa-2x fa-battle-net"></i></span>Getting Started</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-3"><span class="icn"><i class="far fa-2x fa-images"></i></span> E-Tracts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./admin"><span class="icn"><i class="far fa-2x fa-user"></i></span> Admin Login</a>
                        </li>
 
                        <li class="nav-item">
                            <a class="nav-link" href="#section-4"><span class="icn"><i class="far fa-2x fa-comments"></i></span> Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <button class="navbar-button collapsed" type="button">
            <span class="menu_icon">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
        </button>
        
        <main id="content-box" class="order-first">
            <div class="banner-section section parallax-window" data-parallax="scroll" data-image-src="img/section-1-bg.jpg" id="section-1">
                <div class="container">
                    <div class="item">
                       
                        <center> <div class="bg-blue-transparent logo-fa"><span><i class="fas fa-2x fa-atom"></i></span> Christ Cornerstone Society <br/> E-Tract  </div></center>
                        <div style="display:flex;justify-content: space-between;">
                        <small class="bg-blue-transparent simple"><p>Read <br/> E-Tract!</p></small>
                        <small class="bg-blue-transparent simple"><p>Download <br/>E-Tract!</p></small>
                        </div>
                    </div>
                </div>
            </div>
        
            <section class="work-section section" id="section-2">
                <div class="container">
                    <div class="row">
                        <div class="item col-md-4">
                            <div class="tm-work-item-inner">
                                <div class="icn"><i class="fas fa-2x fa-icons"></i></div>
                                <h3>REGISTER</h3>
                                <p>To get started, click on register button below and fill the form correctly </p>
                                <a href="./register.php"><button class="btn btn-primary">Register</button></a>
                            </div>                        
                        </div>
                        <div class="item col-md-4 one">
                            <div class="tm-work-item-inner">
                                <div class="icn"><i class="fas fa-2x fa-tools"></i></div>
                                <h3>UPLOAD E-TRACT</h3>
                                <p>To upload e-tract, you need to get "Access Code" after a successfull registration process</p>
                               <a href="./upload_etract.php"><button class="btn btn-primary">Upload E-Tract</button> </a>
                            </div>
                        </div>
                        <div class="item col-md-4 two">
                            <div class="tm-work-item-inner">
                                <div class="icn"><i class="fa fa-book"></i></div>
                                <h3>DOWNLOAD E-TRACT</h3>
                                <p>To download e-tract, click on the e-tract slide and download </p>
                                <a href="#section-3"><button class="btn btn-primary">Download E-Tract</button> </a>
                            </div>
                        </div>
                    </div>
                    <div class="title">
                        <h2>Getting Started</h2>
                    </div>
                </div>
            </section>

            <section class="gallery-section section parallax-window" data-parallax="scroll" data-image-src="img/section-3-bg.jpg" id="section-3"   style="margin-top:250px;width:100%">
              
            <div class="container">
                    <div class="title text-right">
                        <h2>Download/Read E-Tract</h2>
                    </div>


                    <div class="mx-auto gallery-slider" >
                   

                        <?php
								
								$result_two = $loader->FetchEtract(); 

								foreach($result_two as $row){
								echo'
                               
                                <figure class="effect-julia item">
                               
                                 <img src="etract_img/'.$row['image1'].'" alt="Image">
                                  
                                <figcaption>
                                    <div>
                                        <a href="./download.php?etract='.$row['id'].'"> <p>Download E-Tract</p> </a>
                                        <a href="./readerpage.php?etract='.$row['id'].'"> <p>Read <br>E-Tract</p> </a>
                                        <p style="font-size:11px">
                                        '.$row['downloads'].'+ Downloads<br/> 
                                        '.$row['e-reader'].'+ Readers
                                        </p> 
                                    </div>
                                     
                                </figcaption>
                                <div style="background-color:#fff;color:black;text-transform:uppercase;">
                                <b>'.$row['caption'].'</b></div>
                            </figure>
                               
                                ';
                                }
                        ?>
               
                    </div>
            
            
                    <div class="mx-auto gallery-slider"  style="margin-bottom:150px">
                   

                        <?php
								
								$result_two = $loader->FetchEtract2(); 

								foreach($result_two as $row){
								echo'
                               
                                <figure class="effect-julia item">
                               
                                 <img src="etract_img/'.$row['image1'].'" alt="Image">
                                  
                                <figcaption>
                                    <div>
                                        <a href="./download.php?etract='.$row['id'].'"> <p>Download E-Tract</p> </a>
                                        <a href="./readerpage.php?etract='.$row['id'].'"> <p>Read <br>E-Tract</p> </a>
                                        <p style="font-size:11px">
                                        '.$row['downloads'].'+ Downloads<br/> 
                                        '.$row['e-reader'].'+ Readers
                                        </p> 
                                    </div>
                                     
                                </figcaption>
                                <div style="background-color:#fff;color:black;text-transform:uppercase;">
                                <b>'.$row['caption'].'</b></div>
                            </figure>
                               
                                ';
                                }
                        ?>
               
                    </div>
                </div>
            </section>

            <section class="contact-section section" id="section-4">
                <div class="container">
                    <div class="title">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 mb-4 contact-form">
                            <div class="form tm-contact-item-inner">
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="textarea form-control" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <input type="submit" class="btn btn-primary" value="Send it">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 contact-details">
                            <div class="tm-contact-item-inner-2">
                                <p> Please kindly use our contact info to get in touch with us</p>
                                <ul class="font-weight-light">
                                    <li>
                                        <span class="icn"><i class="fas fa-mobile-alt"></i></span>
                                        <span class="lbl">Tel:</span> <a href="#">010-020-0340</a>
                                    </li>
                                    <li>
                                        <span class="icn"><i class="fas fa-at"></i></span>
                                        <span class="lbl">Email:</span> <a href="#">info@company.com</a>
                                    </li>
                                    <li>
                                        <span class="icn"><i class="fas fa-globe-asia"></i></span>
                                        <span class="lbl">URL:</span> <a href="#">www.company.com</a>
                                    </li>
                                </ul>
                            </div>                        
                        </div>
                        <div class="col-lg-3 col-md-12 map">
                            <!-- Map -->
                            <!-- <div class="map-outer tm-mb-40">
                                <div class="gmap-canvas">
                                    <iframe width="100%" height="400" id="gmap-canvas"
                                        src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div> -->
                        </div>
                    </div>                
                </div>
                <footer class="footer container container-2">
                    <div class="row"> 
                        <p class="col-sm-7">Copyright 2024  Christ Cornerstone Society Etract</p>
                        <p class="col-sm-5 text-right design"><a rel="nofollow" href="https://www.tooplate.com" target="_parent"> </a></p>
                    </div>
                </footer>
            </section>
        </main>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script rc="js/jquery.singlePageNav.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>