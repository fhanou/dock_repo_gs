@extends('layouts.app')

@section('content')

<div class="panel-heading">
    <a href="index3.html" class="brand-link">
        <center><img src="{{ asset('images/logo_men.png') }}"></center>
    </a>
    <h4 style="text-align: center;">MINISTERE DE L'EDUCATION NATIONALE</h4>
    <hr>
    <div class="row">
        <br>
        <div class="col-xs-12">
            <a href="#" class="active">{{ __('Etablissement') }}</a>
        </div>
        <hr>
    </div>
      
</div>
          <div class="panel-body">
                    <form action="{{ Route('etablissement_recherche') }}" method="GET">
                      <input type="text" class="form-control" placeholder="Recherche par code établissement" aria-label="Recipient's username" aria-describedby="basic-addon2" name="code">
                      
                  </form>
                </div>
                <div class="panel-body">
    <form action="{{ Route('etablissement_save') }}" method="get" enctype="multipart/form-data">
      @csrf
      @if($etablissement and count($etablissement)>0 )
      @foreach($etablissement as $etablissements)
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tbody>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_etab">CODE</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control">
                        <input type="hidden" name="code_etab" value="{{ isset($etablissements->code_etab) ? $etablissements->code_etab:'' }}">
                    {{ isset($etablissements->code_etab) ? $etablissements->code_etab:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="dir_dept">NOM</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control">
                        <input type="hidden" name="dir_dept" value="{{ isset($etablissements->dir_dept) ? $etablissements->dir_dept:'' }}">{{ isset($etablissements->dir_dept) ? $etablissements->dir_dept:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_tel">CONTACT</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control">
                        <input type="hidden" name="etab_tel" value="{{ isset($etablissements->etab_tel) ? $etablissements->etab_tel : '' }}">
                        {{ isset($etablissements->etab_tel) ? $etablissements->etab_tel : '' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_email">EMAIL</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control">
                        <input type="hidden" name="etab_email" value="{{ isset($etablissements->etab_email) ? $etablissements->etab_email:'' }}">
                    {{ isset($etablissements->etab_email) ? $etablissements->etab_email:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_dren">DREN</label></th>
                  <td class="text-right" width="80%">
                    <span  class="form-control">
                        <input type="hidden" name="code_dren" value="{{ isset($etablissements->code_dren) ? $etablissements->code_dren:'' }}">{{ isset($etablissements->dren) ? $etablissements->dren:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_cisco">CISCO</label></th>
                  <td class="text-right" width="80%">
                    <span  class="form-control">
                        <input type="hidden" name="code_cisco" value="{{ isset($etablissements->code_cisco) ? $etablissements->code_cisco:'' }}">{{ isset($etablissements->cisco) ? $etablissements->cisco:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_commune">COMMUNE</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control" >
                        <input type="hidden" name="code_commune" value="{{ isset($etablissements->code_commune) ? $etablissements->code_commune:'' }}">{{ isset($etablissements->commune) ? $etablissements->commune:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_zap">ZAP</label></th>
                  <td class="text-right" width="80%">
                    <span  class="form-control">
                        <input type="hidden" name="code_zap" value="{{ isset($etablissements->code_zap) ? $etablissements->code_zap:'' }}">{{ isset($etablissements->zap) ? $etablissements->zap:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_fokontany">FOKONTANY</label></th>
                  <td class="text-right" width="80%">
                    <span class="form-control" value="code_fokontany">
                        <input type="hidden" name="code_fokontany" value="{{ isset($etablissements->code_fokontany) ? $etablissements->code_fokontany:'' }}">{{ isset($etablissements->fokontany) ? $etablissements->fokontany:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="niveau">NIVEAU</label></th>
                  <td class="text-right" width="80%">
                  @php
                    $niveau2 = isset($etablissements->n2) ? $etablissements->n2 : 0;
                    $niveau3 = isset($etablissements->n3) ? $etablissements->n3 : 0;
                @endphp
                <select class="form-control" name="niveau">
                    <option  value="2" @if(isset($niveau2) && $niveau2 == 1 && $niveau3 ==0) selected="true" @endif >
                      Niveau 2 
                    </option>
                    <option value="3" @if(isset($niveau3) && $niveau3 == 1 && $niveau2 == 0) selected="true" @endif >
                    Niveau 3</option>
                </select>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
        
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <input type="submit" id="register-submit" tabindex="6" class="form-control btn btn-register"  value="S'inscrire">
          </div>
        </div>
    </div>
    @endforeach
      @endif
  </form>

        </div>       
    
@endsection
