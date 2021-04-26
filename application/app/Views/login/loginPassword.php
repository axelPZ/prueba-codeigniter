<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--estilos-->
    <link href="<?php echo base_url() ?>/application/public/css/Styless.css" rel="stylesheet">
    
    <!--degradados-->
    <link href="<?php echo base_url() ?>/application/public/css/degradados.css" rel="stylesheet">

    <!--spinner-->
    <link href="<?php echo base_url() ?>/application/public/css/spinner1.css" rel="stylesheet">

    <!--alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--google-font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@700&family=Orelega+One&family=Source+Sans+Pro&display=swap" rel="stylesheet"> 

    <!--animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!--bootstrap-->
    <link rel="stylesheet" type='text/css' href="<?php echo base_url() ?>/application/public/bootstrap/css/bootstrap.css">

    <title>Ingresar..</title>
  </head>
  <body class='login'>
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-lg-6 my-5 pt-5 degradado-2 animate__animated animate__rotateIn">
        <?php if(isset($datos['error'])):?>
          <script>
            swal("Error!", "A ocurrido un error con la Password!", "error");
          </script>
            <div class="alert alert-danger text-white" role="alert">
               Password incorrecta para el correo: <?php echo $_REQUEST['email'];?>, Intenta de nuevo, o <a href="login.php" class="alert-link">Ingresa otro correo aqui</a>
            </div>
        <?php endif?>
        <?php if(isset($datos['mensaje'])):?>
          <script>
            swal("Que bien!", "Ya te as registrado!", "success");
          </script>
            <div class="alert alert-info text-dark" role="alert">
               Te has registrado correctamente ahora ingresa tu contraseña para ingresar.<br/> para cambiar tu imagen ve al menu luego a editar usuario
            </div>
        <?php endif?>
            <form action="<?php echo base_url()?>/application/UsuarioController/loginPassword" method='POST' id='form'>
                <div class="mb-3">

                    <img src="<?php echo $datos['img'];?>" class="rounded mx-auto d-block img-fluid" style='width: 300px;'>
                    <label for="exampleInputEmail1" class="form-label text-white">
                      <b>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        Ingresa la Password de <?php echo $datos['email'];; ?>
                      </b>
                    </label>
                    <input type="hidden" value='login' name='login'/>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                    <input type="hidden" value="<?php echo $datos['email'];?>" name='email'>
                    <input type="hidden" value="<?php echo $datos['img'];?>" name='img'>
                    <div id="emailHelp" class="form-text text-white">
                        Ingresa tu Password
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-warning btn-lg mb-1">Ingresar</button>
                <div class="my-3">
                   <p class='text-white'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-plus mx-2" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                      Si no te as registrado... 
                        <a class='text-warning' href="<?php echo base_url()?>/application/UsuarioController/UsuarioRegistrar">
                      <b> 
                        Click aqui
                      </b>
                    </a>
                </div>
                <div class="sk-chase d-none position-fixed top-50 start-50 translate-middle" id='spinner'>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                </div> 
            </form>
        </div>
       </div>
    </div>
          <!--mis script-->
          <script type="text/javascript" src='js/login1.js' ></script>

        <!-- Script de Bootstrap -->
        <script src="<?php echo base_url();?>/application/public/js/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url();?>/application/public/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/application/public/bootstrap/js/bootstrap.js"></script>

  </body>
</html>
