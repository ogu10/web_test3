<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="../../images/favicons/android-chrome-192x192.png">
    <link href="bootstrap2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--    <link href="../../../Squadfree/assets/vendor/aos/aos.css" rel="stylesheet">-->
    <!--    <link href="../../../Squadfree/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <!--    <link href="../../../Squadfree/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">-->
    <link href="../../../Squadfree/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!--    <link href="../../../Squadfree/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">-->
    <!--    <link href="../../../Squadfree/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--    <script href="ajaxLoad.js"></script>-->
    <?php include 'phpFunction.php'; ?>
</head>
<body>
<header id="header" class="fixed-top header-transparent">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JoBins</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tables">Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#contact">Contact Us</a>
                    </li>
                   <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>-->
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h1>Welcome to our site!</h1>
        <h2>採用成功にコミットする採用管理ツール JoBins</h2>
        <a href="#contact" class="btn-get-started scrollto" data-bs-toggle="tooltip" data-bs-placement="left" title="すくろーる！">
            <i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->

<br><br><br><br>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Services</h2>
            <p>あなたのキャリアや才能をJoBinsで存分に発揮しませんか？<br>
                きちんと成果が評価される環境、人種も国籍も関係なく個人を尊重する組織文化、<br>
                よく働き、よく遊ぶ仕事仲間があなたを待っています！</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4 class="title"><a href="">Nemo Enim</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Services Section -->


<!-- ======= Table Section ======= -->
<section id="tables" class="tables section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Table</h2>
            <p>てーぶるをココに</p>
        </div>
        <div class="container col-md-10">
            <div id="ajaxLoad"></div></div>
<!--        <button type="button" onclick="aaa()">a</button>-->
       <!-- <div class="container col-md-10">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>煌木 太郎</td>
                    <td>taro.kirameki@example.com</td>
                    <td>09011112222</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>煌木 次郎</td>
                    <td>jiro.kirameki@example.com</td>
                    <td>09033334444</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>煌木 花子</td>
                    <td>hanako.kirameki@example.com</td>
                    <td>09055556666</td>
                </tr>
                </tbody>
            </table>
        </div>-->


    </div>
</section>
<br>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <br>
        <div class="section-title">
            <h2>Contact</h2>
            <p>サービスや採用、メディア取材等のお問い合わせはこちらのフォームからお願いいたします。</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>1-19-8, Kitahorie, Nishi-ku, Osaka-city, Osaka</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>t_ogura@jobins.jp</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>06-6567-9460</p>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d140486.89064982085!2d135.32691743281862!3d34.714534730891685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e71d2942f2d7%3A0x6208c7242f57dea7!2z5qCq5byP5Lya56S-Sm9CaW5z!5e0!3m2!1sja!2sjp!4v1652761262004!5m2!1sja!2sjp" width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
<br><br>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h2><b>JoBins</b></h2>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://corp.jobins.jp/" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="https://corp.jobins.jp/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://corp.jobins.jp/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://corp.jobins.jp/" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="https://corp.jobins.jp/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#contact">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="e-mail address"><input type="submit" value="Subscribe">
                    </form>
                    <br><div align="right">
                        <a href="http://localhost/web_test3/pages/test9/test9.php">Link</a></div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>JoBins</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->
<script>
/*    function aa(){
        alert("aa")
    }*/

    function reloadData(){
        $.get("../table12.php").then(
            function(response){
                $("#ajaxLoad").html(response)
            }
        )
    }
    $(document).ready(function(){
        reloadData();
    });

</script>
</body>
</html>