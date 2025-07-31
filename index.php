<?php
session_start();
if(isset($_SESSION['loginUser'])){
    header('Location: public/views/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIDCP</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" />
  <link rel="stylesheet" href="assets/librerias/sweetAlert2/sweetalert2.min.css">


  <!-- Custom fonts for this template-->
  <link href="assets/librerias/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/estilos.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/estilos-login.css">

</head>
<body class="bg-gradient-primary">

  <div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center vh-100 m-0">

      <div class="col-xl-10 col-lg-12 col-md-9 col-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center mb-2">
                    
                    <h1 class="h3 text-primary mb-4"><i class="fas fa-cubes mr-2"></i>SIDCP</h1>
                    <p>SISTEMA DIGITAL DE CONTROL DE PRODUCTOS</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input id="userlg" name="userlg" type="text" class="form-control" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1,15}" required>
                    </div>
                    <div class="form-group">
                      <input type="password" id="passlg" name="passlg" class="form-control"  placeholder="Constraseña" pattern="[A-Za-z0-9!@#$%^&*()_+\-]{6,20}" required>
                    </div>
                    <!--BOTON DE LOGIN-->
                    <button type="button" id="btnlg" class="btn btn-primary btn-block w-100">
                      <i class="fas fa-sign-in-alt mr-2"></i>Ingresar
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                  <span>Copyright &copy; SIDCP 2025</span>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  
  <!-- Bootstrap core JavaScript-->
 <script src="assets/librerias/jquery/jquery.min.js"></script>
 <script src="assets/librerias/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="assets/librerias/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="assets/js/sb-admin-2.min.js"></script>

 <script src="assets/librerias/sweetAlert2/sweetalert2.all.min.js"></script>
 <script src="assets/js/lguser.js"></script>

</body>
</html>
