@extends ('../login/login')

@section('content')

<div class="panel-heading">
  <a href="index3.html" class="brand-link">
      <center><img src="{{ asset('images/logo_men.png') }}"></center>
  </a>
  <h4>MINISTERE DE L'EDUCATION NATIONALE</h4>
  <hr>
  <div class="row">
    <div class="col-xs-6">
      <a href="#" class="active" id="login-form-link">S'authentifier</a>
    </div>
    <div class="col-xs-6">
      <a href="#" id="register-form-link">S'inscrire</a>
    </div>
  </div>
  <hr>
</div>
<div class="panel-body">
  <div class="row">
    <div class="col-lg-12">
      <form id="login-form" action="{{ Route('accueil') }}" method="get" role="form" style="display: block;">
        <div class="form-group">
          <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nom d'utilisateur" value="">
        </div>
        <div class="form-group">
          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mots de passe">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <input type="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="S'authentifier">
            </div>
          </div>
        </div>
      </form>
      <!-- Créer compte utilisateur -->
      <form id="register-form" action="{{ Route('save_uti') }}" method="get" role="form" style="display: none;">
        <div class="form-group">
     <input type="text" name="nom_uti" tabindex="1" placeholder="Entrez le nom!" class="form-control" required="Veuillez remplir ce champ!">
        </div>
        <div class="form-group">
          <input type="email" name="email_uti" tabindex="2" placeholder="Entrez l'email!" class="form-control" required="Veuillez remplir ce champ!">
        </div>
        <div class="form-group">
          <input type="text" name="nom_utilisateur" tabindex="3" placeholder="Entrez le nom d'utilisateur!" class="form-control" required="Veuillez remplir ce champ! ">
        </div>
        <div class="form-group">
          <input type="text" name="mot_de_passe" tabindex="4" placeholder="Entrez le mots de passe!" class="form-control" required="Veuillez remplir ce champ! ">
        </div>
        <div class="form-group">
            @php
              $fonction_select = isset($utilisateur->fonction) ? $utilisateur->fonction : 0;
          @endphp
          <select name="fonction" class="form-control" required="Veuillez remplir ce champ!" tabindex="5" >
              <option value="0" >Choisissez votre fonction!</option>
              <option value="Administrateur" >Administrateur</option>
              <option value="Directeur">Directeur</option>
          </select>
          </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <input type="submit" id="register-submit" tabindex="6" class="form-control btn btn-register"  value="Suivant">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection