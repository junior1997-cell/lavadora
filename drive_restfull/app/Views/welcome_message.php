 <?php

    $curl = curl_init();
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://drymatch.informaticapp.com/index.php/registros",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => 
          "nombres=".$_POST["nombres"].
            "&apellidos=".$_POST["apellidos"].
            "&email=".$_POST["email"],
          CURLOPT_HTTPHEADER => array(
            "Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VITi5yb3hMT1dZbkV6bXV0VGFScExVaTQyOFltaUsuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbEVLa3hFSkt0d0FPSnd4aExXU3E4TUNPZXB2eHFpaQ==",
            "Content-Type: application/x-www-form-urlencoded"
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $datos= json_decode($response,true);
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start APIs</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="public/jhefry/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Servicio de nuestra Api</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#inicio">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Pasos a Seguir</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Obten tu clave</a></li>
                        <!--<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="api.php">Api</a></li>-->
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#Conocenos">Conocenos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column" id="inicio">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="public/jhefry/assets/img/avataaars.svg" alt="" /><!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">El Mundo de las Apis</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0"><i><b>Bienvenidos, la presente plataforma contiene la   API desarrollada para ser utilizada por desarrolladores de software. La API permite el 
                        acceso directo al trabajo con la información de nuestra base de datos desde 
                        tu aplicación. Usa una interfaz RESTful y retorna los datos en formato JSON.
                        La información invocadas a través de la API proveen un acceso estándar online
                        a datos contenidos en páginas HTML y otros archivos similares disponibles en 
                        Internet. Registre sus datos y consiga la autorización para trabajar en 
                        nuestra plataforma, ya que requiere de datos de autorización, la puedes solicitar 
                        a través del siguiente formulario</i></b></p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pasos a seguir</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row">
                    <!-- Portfolio Item 1-->

                    <div class="col-md-6 col-lg-4 mb-5">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >PASO NÚMERO 1</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso1.PNG" alt="" />
                            <br><br><br>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso2.1.png" alt=""/>
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    
                    <div class="col-md-6 col-lg-4 mb-5">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >PASO NÚMERO 2</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                             <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso2.1.1.png" alt="" />
                             <br><br>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso2.jpg"/>
                        </div>
                    </div>
                    <!-- Portfolio Item 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >PASO NÚMERO 3</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso3.jpg"/>
                        </div>
                    </div>
                    <!-- Portfolio Item 4-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >PASO NÚMERO 4</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso4.png"/>
                            <br><br><br>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso4.1.png"/>
                        </div>
                    </div>
                    <!-- Portfolio Item 5-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >PASO NÚMERO 5</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso5.png"/>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso5.1.png"/>
                        </div>
                    </div>
                    <!-- Portfolio Item 6-->
                    <div class="col-md-6 col-lg-4">
                        <center><h5 class="card-title"><i class="badge badge-danger" style="color: black;" >MUCHAS GRACIAS</i></h5></center>
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6" style="height: 300px;">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <br><br><br>
                            <img class="img-fluid" src="public/jhefry/assets/img/portfolio/paso6.jpg" width="500" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Solicitud de Acceso a Datos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <body class="text-justify">
                        <div class="container-fluid">
                            <div class="row">
                                <div id="ocultar">
                                    <div class="row col-xl-8 offset-2 bg-dark text-white font-weight-bold">
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            print_r($datos['Detalle']);
                                        }
                                        ?>
                                    </div>
                                    <div class="row col-xl-8 offset-2 bg-success text-white font-weight-bold">
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                            print_r($datos['Credenciales']['cliente_id']);
                                        }
                                        ?>
                                    </div>
                                    <div class="row col-xl-8 offset-2 bg-info text-white font-weight-bold">

                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            print_r("Llave secreta: ".$datos['Credenciales']['llave_secreta']);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    
                        <div class="container">
                            <div class="row text-center text-uppercase">
                                <div class="col pt-3">
                                </div>
                            </div>
                            <div class="row col-xl-12 offset-2">
                                <!-- FORMULARIO DE REGISTRO -->
                                <form method="post" class="col-sm-8">
                                    <div class="form-row">
                                        <!-- NOMBRES -->
                                        <div class="form-group col-sm-6">
                                            <input type="text" name="nombres" placeholder="Nombres" class="form-control form-control-sm" required >
                                        </div>
                                        <!-- APELLIDOS -->
                                        <div class="form-group col-sm-6 ">
                                            <input type="text" name="apellidos" placeholder="Apellidos" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- EMAIL -->
                                        <div class="form-group col-sm-12">
                                            <input title="El email debe de ser Único" type="email" name="email" placeholder="E-mail" class="form-control form-control-sm" required>
                                        </div>
                                        <!--<div>
                                            <input type="text" name="apellido" id="apellido" class="input-large" pattern="[A-Za-z]{3,100}" required oninput="check_text(this);"/>
                                        </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-9">
                                            <button type="submit" class="btn btn-success btn-sm btn-block registrar" id="registrar" onclick="modales()">Registrar</button>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <button type="button" class="btn btn-danger btn-sm btn-block"data-toggle="modal" data-target=".bd-example-modal-lg">Verificar</button>
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                         
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="x" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style=" background: #5DADE2; padding:16px 16px 0px 16px !important;" >
                                        <div class="row col-xl-11 offset-0 p-3 mb-2 bg-white text-dark" style="margin-left: .1rem!important; background: #5DADE2!important;">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                print_r($datos['Detalle'].' amigo <b>'.$datos['Credenciales']['nom'].'</b>');
                                            }
                                            ?>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body" style=" padding:16px 16px 16px 16px !important;">
                                        <div class="row col-xl-12 offset-0 p-3 mb-2 bg-info text-dark" style="margin-left: .1rem!important; background: #E8F917!important;" >
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    print_r('<b>'."Cliente id: ".'</b><i>'.$datos['Credenciales']['cliente_id'].'</i>');
                                                    //echo "Aquie el cliente id de la api";
                                                }
                                                ?>
                                        </div>
                                    
                                        <div class="row col-xl-12 offset-0 p-3 mb-2 bg-secondary text-dark" style="margin-left: .1rem!important; background: #70F917!important;">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    print_r('<b>'."Llave secreta: ".'</b><i>'.$datos['Credenciales']['llave_secreta'].'</i>');
                                                }
                                               // echo "hola soy soy tu ";
                                                ?>
                                        </div>
                                    </div>
                                    
                                    <!--<div class="modal-footer">
                                    </div>-->

                                </div>
                            </div>
                        </div>
                      
                    </body>
                </div>
            </div>
               
        </section>

        <section id="Conocenos">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col text-center text-uppercase">
                        <h1 class="page-section-heading text-center text-uppercase text-secondary mb-0">Conocenos</h1>
                         <small>Información de los Desarroladores</small>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-6 col-12 mt-2 mb-2">
                        <div class="card">
                            <img style="" src="public/jhefry/assets/img/juni.png" class="card-img-top" width="200" height="300">
                            <div class="card-body">

                                <center><h4 class="card-title" ><i class="badge badge-info" style="color: black;" >Descripción</i></h4>
                                <b>Nombres:</b>  <a class="card-text" style="color: green;">Junior Cercado Vasquez.</a>
                                <b>Correo:</b>  <a href="#" class="card-text" style="color: blue;">junior.cercado@upeu.edu.pe</a>
                                <b>Ocupación:</b>  <a class="card-text" style="color: green;">Estudiante.</a><br></center>
                                   
                            </div>
                            <center><small>Universidad Peruana Union</small></center> 
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-md-6 col-12 mt-2 mb-2">
                        <div class="card">
                            <img style="" src="public/jhefry/assets/img/david.jpeg" class="card-img-top" width="200" height="300">
                            <div class="card-body">

                                <center><h4 class="card-title" ><i class="badge badge-info" style="color: black;" >Descripción</i></h4>
                                <b>Nombres:</b>  <a class="card-text" style="color: green;">David Requejo SantaCruz.</a>
                                <b>Correo:</b>  <a href="#" class="card-text" style="color: blue;">davidrequejo@upeu.edu.pe</a>
                                <b>Ocupación:</b>  <a class="card-text" style="color: green;">Estudiante.</a><br></center>
                                   
                            </div>
                            <center><small>Universidad Peruana Union</small></center> 
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-md-6 col-12 mt-2 mb-2">
                        <div class="card">
                            <img style="" src="public/jhefry/assets/img/jeison.jpg" class="card-img-top" width="200" height="300">
                            <div class="card-body">

                                <center><h4 class="card-title" ><i class="badge badge-info" style="color: black;" >Descripción</i></h4>
                                <b>Nombres:</b>  <a class="card-text" style="color: green;">Jheyfer Elí Arévalo Cavanillas.</a>
                                <b>Correo:</b>  <a href="#" class="card-text" style="color: blue;">jheyferarevalo@upeu.edu.pe</a>
                                <b>Ocupación:</b>  <a class="card-text" style="color: green;">Estudiante.</a><br></center>
                                   
                            </div>
                            <center><small>Universidad Peruana Union</small></center> 
                        </div>
                    </div>

                     <div class="col-lg-2 col-md-6 col-12 mt-2 mb-2">
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 col-md-6 col-12 mt-2 mb-2">
                        <div class="card">
                            <img style="" src="public/jhefry/assets/img/papu.jpeg" class="card-img-top" width="200" height="300">
                            <div class="card-body">

                                <center><h4 class="card-title" ><i class="badge badge-info" style="color: black;" >Descripción</i></h4>
                                <b>Nombres:</b>  <a class="card-text" style="color: green;">Jhon Erickson Huaman.</a>
                                <b>Correo:</b>  <a href="#" class="card-text" style="color: blue;">jhon.huaman@upeu.edu.pe</a>
                                <b>Ocupación:</b>  <a class="card-text" style="color: green;">Estudiante.</a><br></center>
                                   
                            </div>
                            <center><small>Universidad Peruana Union</small></center> 
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-md-6 col-12 mt-2 mb-2">
                        <div class="card">
                            <img style="" src="public/jhefry/assets/img/prima.jpeg" class="card-img-top" width="200" height="300">
                            <div class="card-body">

                                <center><h4 class="card-title" ><i class="badge badge-info" style="color: black;" >Descripción</i></h4>
                                <b>Nombres:</b>  <a class="card-text" style="color: green;">Lisset Huaman Camizan.</a>
                                <b>Correo:</b>  <a href="#" class="card-text" style="color: blue;">lissethuaman@upeu.edu.pe</a>
                                <b>Ocupación:</b>  <a class="card-text" style="color: green;">Estudiante.</a><br></center>
                                   
                            </div>
                            <center><small>Universidad Peruana Union</small></center> 
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <br>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">2215 John Daniel Drive<br />Clark, MO 65243</p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Enuentrano en la Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://web.whatsapp.com/"><i class="fab fa-fw fa-whatsapp fa-lg"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/"><i class="fab fa-fw fa-instagram fa-lg"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/"><i class="fab fa-fw fa-twitter"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <section class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Your Website 2020</small></div>
        </section>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Portfolio Modals--><!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">PASO NÚMERO 1</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso1.PNG" alt="" />
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso2.1.png" alt="" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b>Completa todos tus datos y dirigete al boton <a href="#">Registrar</a>, Cuando hayas presionado el boton <a href="#">Registrar</a> dirigite al boton <a href="#">Verificar</a> para obtener tu <i>Cliente Id y tu Llave secreta</i></b><a class="btn btn-outline-light btn-social mx-1" title="Dirigete al paso Numero 2"><i class="fas fa-star fa-arrow-circle-right fa-lg"></i></a></p>
                                    <!--<button class="btn btn-primary" href="#" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Close Window</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">PASO NÚMERO 2</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso2.1.1.png" alt="" />
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso2.jpg" alt="" /><!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b>Luego de haber llenado todos los campos dirigete al boton <a href="#">Verificar</a> tal como vez en la imagen, para poder visualizar tu <i>Ciente Id y tu Llave secreta</i></b></p>
                                    <a class="btn btn-outline-light btn-social mx-1" title="Dirigete al paso Numero 2"><i class="fas fa-star fa-arrow-circle-right fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">PASO NÚMERO 3</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso3.1.png" alt="" />
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso3.png" alt="" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b>Copia tu <i>Cliente Id y tu Llave secreta</i> y dirigite al <a href="#">Postman</a> tal como ves en la imagen, Luego de eso dirigete ah <i>Autorización</i> para poder pegar tu <i>Cliente Id y tu Llave secreta</i>.</b></p>
                                    <a class="btn btn-outline-light btn-social mx-1" title="Dirigete al paso Numero 2"><i class="fas fa-star fa-arrow-circle-right fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><b>PASO NÚMERO 4</b></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso4.png"/>
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso4.1.png"/>
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b>Una ves que hayas pegado da clic en enviar("Send") con la ruta respectiva y el metodo que desees realizar.</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">PASO NÚMERO 5</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso5.png" alt="" />
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso5.1.png" alt="" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b>Al presionar <i>CODE</i> te saldra un formulario conun respectivo codigo, luego de eso <i>COPIA</i> el código y pegalo en el código de tu sistema que estés trabajando</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">muchas gracias</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="public/jhefry/assets/img/portfolio/paso5.1.jpg" width="500" height="500" /><!-- Portfolio Modal - Text-->
                                    <p class="mb-5"><b><i>MUCHAS GRACIAS POR SEGUIR LOS PASOS</i></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="public/jhefry/assets/mail/jqBootstrapValidation.js"></script>
        <script src="public/jhefry/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="public/jhefry/js/scripts.js"></script>
    </body>
</html>

<style type="text/css">
    .tamaño {height: 100% !important;}
</style>

<script>
    function modales(){
        $('#modal').modal('show');
    }
</script>

<script>
    
    $('#ocultar').hide();

    $(document).ready(function(){ 

  
   
  $("#btn3").click(function(){
          VanillaToasts.create({
              title: 'Message Title',
              text: 'Notification text',
              type: 'error',
              icon: 'img/error.png',
               timeout: 6000
          });
      });       
    
    $("#registrar").click(function(){
        VanillaToasts.create({
            title: 'Message Title',
            text: 'Notification text',
            type: 'success',
            icon: 'img/success.png',
             timeout: 6000
        });
    });  
});     
</script>

<script type="text/javascript">
function check_text(input) {  
    if (input.validity.patternMismatch){  
        input.setCustomValidity("Debe ingresar al menos 3 LETRAS");  
    }  
    else {  
        input.setCustomValidity("");  
    }                 
}  </script>