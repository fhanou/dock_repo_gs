<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MEN::GESTION DE SCOLARITE</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">

              @yield('content')
          </div>
        </div>                
      </div>
  </div>                
</body>
</html>

<script type="text/javascript">
  $(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});
</script>