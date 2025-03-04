
<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
       
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/LineIcons.2.0.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .footer {
            background-color: #f6fff4; /* Couleur de fond */
            padding: 20px 0;
            text-align: center;
        }
        .footer .contact-info {
            font-weight: bold;
        }
        .footer .social-icons a {
            color: black;
            font-size: 20px;
            margin: 0 10px;
        }
        .footer .social-icons a:hover {
            color: #007bff;
        }
        .footer .copyright {
            font-size: 14px;
            color: gray;
        }
        .footer .bottom-bar {
            height: 5px;
            background: linear-gradient(to right, green 30%, yellow 30%, yellow 60%, red 60%);
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->


    <!-- End Header Area -->
        @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Middle Top -->
        <div class="footer-middle"style=" padding-top: 0 !important; padding-bottom: 10px !important;" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/logo-removebg-preview.png')}}" alt="Logo" style="height: 60px; width: 60px;"></a>
                            </div>
                            <p>Ce projet a pour ambition de développer une plateforme e-learning accessible et conviviale
                                 pour permettre l’atteinte des objectifs pédagogiques . </p>
                            <div class="footer-social">
                                <ul>
                                    <a href="http://www.dcsca.bj/" target="_blank">
                                        <i class="lni lni-world" style="font-size: 18px;"></i>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 text-center">
                        <!-- Single Widget -->
                        <div class="single-footer sm-custom-border f-link ">
                            <h3>Liens Rapides</h3>
                            <ul>
                                <li><a href="/">ACCUEIL</a></li>
                                <li><a href="formation">FORMATIONS</a></li>
                                <li><a href="documents">DOCUMENTS</a></li>

                                <li><a href="video">VIDEOS</a></li>
                                <li><a href="contact">CONTACTS</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer footer-newsletter">
                            <h3 class="text-center">Le bulletin d'information</h3>
                            <p>Abonnez-vous pour toujours rester en contact avec nous et recevoir les dernières nouvelles sur notre entreprise et toutes nos activités !</p>
                            <form action="https://demo.graygrids.com/themes/edugrids/mail/mail.php" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Votre mail" class="common-input"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your email address'" required="" type="email">
                                <div class="button text-center">
                                    <button class="btn " style="background-color: rgb(199,175,13)">Abonnez-vous Maintenant !</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        {{--  <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">
                                <p>Tous droits réservés par la DCSCA.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
        <!-- End Footer Middle -->
    </footer>
    <footer class="footer">
        <div class="container">
        

        <!-- Deuxième ligne : Centre -->
        <div class="d-flex flex-column align-items-center text-center ">
            <div  style="color:black;" class="d-flex flex-column flex-md-row mb-2 text-black text-center text-md-start">
    <p class="fw-bold me-md-3">01 BP 2493 Cotonou</p>
    <p class="me-md-3 fs-6"><i class="fa-solid fa-envelope"></i> courrierdcsca@mil.bj</p>
    {{-- <p><i class="fa-solid fa-phone"></i> +229 21 30 05 36</p> --}}
</div>

            {{--  <div class="d-flex mb-2 " style="color:black;">
                <p  class="fw-bold me-3">01 BP 2493 Cotonou</p>
                <p class="me-3 fs-6"><i class="fa-solid fa-envelope"></i> mdn.contact@gouv.bj</p>
                <p><i class="fa-solid fa-phone"></i> +229 21 30 05 36</p>
            </div>  --}}
            {{-- <div>
                <h6 style="color:black;" class="fw-bold mb-2">Réseaux sociaux</h6>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div> --}}
        </div>

        <!-- Troisième ligne : Copyright centré -->
        <div class="text-center mt-3">
           
        </div>

        <!-- Première ligne : Texte à gauche et à droite -->
        {{--  <div class="d-flex justify-content-between align-items-center mb-3">
             <p class="copyright fs-6">Copyright © 2022 Ministère de la Défense Nationale</p>
            <p class="text-muted">Made by EASY ITEAM</p>
        </div>  --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 text-center text-md-start">
    <p class="copyright fs-6">Copyright © 2025 Tous droits réservés par la DCSCA.</p>
    <p class="text-muted">DCSCA</p>
</div>

    </div>
   {{-- <div class="container">
          <div class=" align-items-center">
            <div class=" d-flex text-center">
                <p class="contact-info">01 BP 2493 Cotonou</p>
                <p><i class="fas fa-envelope"></i> mdn.contact@gouv.bj</p>
                <p><i class="fas fa-phone"></i> +229 21 30 05 36</p>
            </div>
            <div class="col-md-4 text-md-center text-center">
                <p class="fw-bold">Réseaux sociaux</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-md-4 text-md-end text-center">
                <p class="copyright">Copyright © 2022 Ministère de la Défense Nationale</p>
                <p class="text-muted">Made by EASY ITEAM</p>
            </div>
        </div>
    </div>  --}}
    <div class="bottom-bar"></div>
</footer>
{{--
<footer style="background-color: #0C1B2B; color: white; padding: 30px 0; font-family: Arial, sans-serif;">
    <div style="width: 90%; margin: auto;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">GOUVERNEMENT</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Programme d'Actions</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Membres du gouvernement</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Tous les ministères</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Plateformes et e-services</a></li>
                </ul>
            </div>
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">PUBLICATIONS</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Actualités</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Vidéos</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Documents</a></li>
                </ul>
            </div>
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">OPPORTUNITÉS</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Offres d'emploi</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Marchés publics</a></li>
                </ul>
                <h3 style="font-size: 14px; font-weight: bold; margin-top: 10px;">ÉVÉNEMENTS</h3>
            </div>
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">LE BÉNIN</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Histoire</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Les armoiries</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Le drapeau</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">L'hymne national</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Géographie</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Communes du Bénin</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Attractions et monuments</a></li>
                </ul>
            </div>
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">CORONAVIRUS</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Dernières informations</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Mesures de riposte</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Actualités</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Infographies</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Audios</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Vidéos</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Documents</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Foire aux questions</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Initiatives solidaires</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Dons reçus</a></li>
                </ul>
            </div>
            <div style="width: 16%; min-width: 180px;">
                <h3 style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">LIENS UTILES</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Présidence du Bénin</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Programme d'Action du Gouvernement</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Secrétariat général du Gouvernement</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">#AskGouvBénin</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Service Public</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Investir au Bénin</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Obtenir un e-Visa</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="text-align: center; border-top: 1px solid #2A3B4C; padding: 15px 0; margin-top: 20px;">
        <p style="margin: 0;">© Présidence de la République du Bénin - 2023</p>
        <a href="#" style="color: #FFC107; text-decoration: none; font-weight: bold;">Mentions légales et gestions des cookies</a>
    </div>
</footer>  --}}
 {{--  <footer style="background-color: #0C1B2B; color: white; padding: 40px 0; font-family: Arial, sans-serif;">
        <div style="width: 90%; margin: auto;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">GOUVERNEMENT</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Programme d'Actions</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Membres du gouvernement</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Tous les ministères</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Plateformes et e-services</a></li>
                    </ul>
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">PUBLICATIONS</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Actualités</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Vidéos</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Documents</a></li>
                    </ul>
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">OPPORTUNITÉS</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Offres d'emploi</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Marchés publics</a></li>
                    </ul>
                    <h3 style="font-size: 14px; font-weight: bold; margin-top: 10px;">ÉVÉNEMENTS</h3>
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">LE BÉNIN</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Histoire</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Les armoiries</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Le drapeau</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">L'hymne national</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Géographie</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Communes du Bénin</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Attractions et monuments</a></li>
                    </ul>
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">CORONAVIRUS</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Dernières informations</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Mesures de riposte</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Actualités</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Infographies</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Audios</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Vidéos</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Documents</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Foire aux questions</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Initiatives solidaires</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Dons reçus</a></li>
                    </ul>
                </div>

                <div style="flex: 1; min-width: 180px;">
                    <h3 style="font-size: 14px; font-weight: bold;">LIENS UTILES</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Présidence du Bénin</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Programme d'Action du Gouvernement</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Secrétariat général du Gouvernement</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">#AskGouvBénin</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Service Public</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Investir au Bénin</a></li>
                        <li><a href="#" style="color: white; text-decoration: none; font-size: 13px;">Obtenir un e-Visa</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="text-align: center; border-top: 1px solid #2A3B4C; padding: 15px 0; margin-top: 20px;">
            <p style="margin: 0;">© Présidence de la République du Bénin - 2023</p>
            <a href="#" style="color: #FFC107; text-decoration: none; font-weight: bold;">Mentions légales et gestions des cookies</a>
        </div>
    </footer>  --}}

    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/count-up.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
        });
        //========= testimonial
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 3,
                }
            }
        });
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>

            swal( "{!!Session::get('success')!!}","", 'success', {
                button: true,
                button:"OK",
                timer: 5000,
            });



    </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>


