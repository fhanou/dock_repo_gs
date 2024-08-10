@extends ('../layout')

@section('content')
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Elève</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($eleve) ? $eleve : 0 }}</div>
                    </div>
                    <div class="col-auto">
                        
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Enseignant</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($enseignant) ? $enseignant : 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mobilier
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($mobilier) ? $mobilier : 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-suitcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Immobilier</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($immobilier) ? $immobilier : 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   


<h6><strong><i>INFORMATION CONCERNANT L'ETABLISSEMENT:</i></strong></h6>
  @if($etablissements and count($etablissements)>0 )
      @foreach($etablissements as $etablissement)
    <div class="row">
        <div class="col-md-6">
          <table class="table table-striped">
            <tbody>

                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_etab">CODE</label></th>
                  <td class="text-right" width="80%"><span class="form-control">
                        
                    {{ isset($etablissement->code_etab) ? $etablissement->code_etab:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="dir_dept">NOM</label></th>
                  <td class="text-right" width="80%"><span name="dir_dept" class="form-control" >{{ isset($etablissement->dir_dept) ? $etablissement->dir_dept:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_tel">CONTACT</label></th>
                  <td class="text-right" width="80%"><span name="etab_tel" class="form-control">{{ isset($etablissement->etab_tel) ? $etablissement->etab_tel : '' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_email">EMAIL</label></th>
                  <td class="text-right" width="80%"><span type="text" name="etab_email" class="form-control" >{{ isset($etablissement->etab_email) ? $etablissement->etab_email:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_dren">DREN</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_dren" class="form-control" >{{ isset($etablissement->dren) ? $etablissement->dren:'' }}</span></td>
                </tr>
                </tbody>
          </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <tbody>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_cisco">CISCO</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_cisco" class="form-control" >{{ isset($etablissement->cisco) ? $etablissement->cisco:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_commune">COMMUNE</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_commune" class="form-control" >{{ isset($etablissement->commune) ? $etablissement->commune:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_zap">ZAP</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_zap" class="form-control" >{{ isset($etablissement->zap) ? $etablissement->zap:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_fokontany">FOKONTANY</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_fokontany" class="form-control" >{{ isset($etablissement->fokontany) ? $etablissement->fokontany:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="niveau">NIVEAU</label></th>
                  <td class="text-right" width="80%"><span type="text" name="niveau" class="form-control" >{{ isset($etablissement->niveau) ? $etablissement->niveau:'' }}</span></td>
                </tr>
            </tbody>
          </table>
        </div>
    </div>
    @endforeach
      @endif
@endsection










