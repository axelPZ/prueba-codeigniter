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

    <title>Hello, world!</title>
  </head>
  <body class='login'>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-lg-7 my-5 pt-5">

            <?php if(isset($mensaje)):?>
                <script>
                swal("Error!", "A ocurrido un error al registrarte!", "error");
                </script>
                <div class="alert alert-danger" role="alert">
                    Ocurrio un error al registrarte,  Puede que "<?php echo $mensaje;?>" el correo ya exista, Intentalo con otro o. <a href="<?php echo base_url()?>/application/" class="alert-link">logeate aqui</a>
                </div>
            <?php endif?>

            <form action='<?php echo base_url()?>/application/UsuarioController/registrarUsuario' method="POST" class=" p-3 shadow degradado-2 animate__animated animate__zoomInRight" id='form'>

                <div class="mb-3 text-center">
                   <h1 class='text-warning'>Registrarte</h1>
                </div>
                <div class="mb-3 name">
                    <label for="exampleInput" class="form-label text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                        </svg>
                        Nombre:
                    </label>
                    <input class="form-control form-control border border-1 border-info" id='name' name='name' type="text" aria-label=".form-control-lg example">
                    <div id="emailHelp" class="form-text text-warning">Puedes ingresar los dos nombres</div>
                </div>
                <div class="mb-3 surname">
                    <label for="exampleInput" class="form-label text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                        </svg>
                        Apellido:
                    </label>
                    <input class="form-control form-control border border-1 border-info" id='surname' name='surname' type="text" aria-label=".form-control-lg example">
                    <div id="emailHelp" class="form-text text-warning">Ingresa tu apellido</div>
                </div>
                <div class="mb-3 email">
                    <label for="exampleInputEmail1" class="form-label text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        Correo Electronico:
                    </label>
                    <input type="email" class="form-control border border-1 border-info" id='email' name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-warning">Con la cuenta de correo electronico ingresaras a la pagina.</div>
                </div>
                <div class="mb-3 password">
                    <label for="exampleInputPassword1" class="form-label text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        Password:
                    </label>
                    <input type="password" class="form-control border border-1 border-info" id='pass' name="pass" id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text text-warning">Solo se haceptan 8 caracteres, Una "May", una "min", y un numero</div>
                </div>
                <div class="mb-3 password">
                    <label for="exampleInputPassword1" class="form-label text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        Repetir Password:
                    </label>
                    <input type="password" class="form-control border border-1 border-info" id='pass2' name="pass2" id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text text-warning">Solo se haceptan 8 caracteres, Una "May", una "min", y un numero</div>
                </div>
                <div class="sk-chase d-none position-fixed top-50 start-50 translate-middle" id='spinner'>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                </div> 
                <button type="submit" id='btn-registrar' class="btn btn-warning btn-lg mb-1 mostrarSpinner" disabled='disabled'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-plus mx-2" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    Registrarse
                </button>
            </form>
            </div>
        </div>
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!--my script-->
    <script type='text/javascript' src='<?php echo base_url()?>/application/public/js/app.js'></script>
    <script type='text/javascript' src='<?php echo base_url()?>/application/public/js/registrar/app.js'></script>
  </body>
</html>