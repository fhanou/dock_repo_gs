@extends ('../layout')

@section('content')
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
<hr>

<h6><strong><i>INFORMATION CONCERNANT L'ETABLISSEMENT:</i></strong></h6>
    <div class="row">
        <div class="col-md-6">
            <tbody>
                @if($etablissement and count($etablissement)>0 )
      @foreach($etablissement as $etablissements)
                  <label for="code_etab">CODE:</label></th>
                  <span class="form-control">
                        
                    {{ isset($etablissements->code_etab) ? $etablissements->code_etab:'' }}</span></td>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="dir_dept">NOM</label></th>
                  <td class="text-right" width="80%"><span name="dir_dept" class="form-control" >{{ isset($etablissements->dir_dept) ? $etablissements->dir_dept:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_tel">CONTACT</label></th>
                  <td class="text-right" width="80%"><span name="etab_tel" class="form-control">{{ isset($etablissements->etab_tel) ? $etablissements->etab_tel : '' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="etab_email">EMAIL</label></th>
                  <td class="text-right" width="80%"><span type="text" name="etab_email" class="form-control" >{{ isset($etablissements->etab_email) ? $etablissements->etab_email:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_dren">DREN</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_dren" class="form-control" >{{ isset($etablissements->dren) ? $etablissements->dren:'' }}</span></td>
                </tr>
                </tbody>
        </div>
        <div class="col-md-6">
            
                <tbody>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_cisco">CISCO</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_cisco" class="form-control" >{{ isset($etablissements->cisco) ? $etablissements->cisco:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_commune">COMMUNE</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_commune" class="form-control" >{{ isset($etablissements->commune) ? $etablissements->commune:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_zap">ZAP</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_zap" class="form-control" >{{ isset($etablissements->zap) ? $etablissements->zap:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="code_fokontany">FOKONTANY</label></th>
                  <td class="text-right" width="80%"><span type="text" name="code_fokontany" class="form-control" >{{ isset($etablissements->fokontany) ? $etablissements->fokontany:'' }}</span></td>
                </tr>
                <tr>
                  <th scope="row" class="text-right" width="20%"><label for="niveau">NIVEAU</label></th>
                  <td class="text-right" width="80%"><span type="text" name="niveau" class="form-control" >{{ isset($etablissements->fokontany) ? $etablissements->fokontany:'' }}</span></td>
                </tr>
                @endforeach
      @endif
            </tbody>
          
        </div>
    </div>
@endsection
