<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Page introuvable</title>




  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('Admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('Admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('Admin/assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>La page que vous tentez de rejoindre n'éxiste pas</h2>
        <a class="btn" href="{{route('Public.home')}}">Retour</a>
        <img src="{{asset('Admin/assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">

      </section>

    </div>
  </main><!-- End #main -->



  <!-- Vendor JS Files -->
  <script src="{{asset('Admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('Admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('Admin/assets/js/main.js')}}"></script>

</body>

</html>
