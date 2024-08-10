@extends ('../login/login')

@section('content')

<div class="panel-heading">
  <a href="index3.html" class="brand-link">
      <center><img src="{{ asset('images/logo_men.png') }}"></center>
  </a>
  <h4>MINISTERE DE L'EDUCATION NATIONALE</h4>
  <hr>
  <div class="row">
    <div class="col-xs-12">
      <label>Etablissement</label>
    </div>
  </div>
  <hr>
</div>
<div class="panel-body">
    <form action="{{ Route('etablissement_recherche') }}" method="GET">
      <input type="text" class="form-control" placeholder="Recherche par code établissement" aria-label="Recipient's username" aria-describedby="basic-addon2" name="code">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
      </div>
  </form>
</div>
@endsection