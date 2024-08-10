<!DOCTYPE html>
<html>
<head>
	<title>Liste Enseignant</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<table>
				<tbody>
					@if($etablissements and count($etablissements)>0 )
						@foreach($etablissements as $etablissement)
				    <tr>
				      	<th scope="row" class="text-left">
					      	<label for="code_cisco">CISCO : {{ isset($etablissement->cisco) ? $etablissement->cisco:'' }}</label> <br>
					      	<label for="code_zap">ZAP : {{ isset($etablissement->zap) ? $etablissement->zap:'' }}</label> <br>
					      	<label for="dir_dept">{{ isset($etablissement->dir_dept) ? $etablissement->dir_dept:'' }}</label> <br>
					      	<label for="code_etab">CODE : {{ isset($etablissement->code_etab) ? $etablissement->code_etab:'' }}</label>
					    </th>
					   
				    </tr>
				    @endforeach
					@endif
				</tbody>
			</table>
		</div>		
	</div>
	<div class="container-fluid">
		<h4 class="text-center">LISTE DES ENSEIGNANTS</h4>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-bordered">
			  <thead>
			    <tr>
			    	<th class="text-center" scope="col">CIN</th>
			      	<th class="text-center" scope="col">NOM ET PRENOMS</th>
			      	<th class="text-center" scope="col">DATE ET LIEU DE NAISSANCE</th>
			      	<th class="text-center" scope="col">SEXE</th>
			      	<th class="text-center" scope="col">FONCTION ET STATUS</th>
			      	<th class="text-center" scope="col">MATIERE ENSEIGNEE</th>
			      	<th class="text-center" scope="col">DATE DE PRISE DE SERVICE</th>
			      	<th class="text-center" scope="col">ADRESSE ET CONTACT</th>
			      	
			    </tr>
			  </thead>
			  <tbody>
			  		@if(isset($enseignant) && count($enseignant) > 0)
			  		@foreach($enseignant as $enseignants)
				    <tr>
				    	<td>{{ isset($enseignants->cin) ? $enseignants->cin : "" }}</td>
				    	<td>{{ isset($enseignants->nom) ? $enseignants->nom : "" }}  {{ isset($enseignants->prenoms) ? $enseignants->prenoms : "" }}</td>
				      	<td>{{ isset($enseignants->date_nais) ? $enseignants->date_nais : "" }} à {{ isset($enseignants->lieu_nais) ? $enseignants->lieu_nais : "" }}</td>
				      	<td>{{ isset($enseignants->sexe) ? $enseignants->sexe : "" }}</td>
				      	<td>{{ isset($enseignants->nom_fonction) ? $enseignants->nom_fonction : "" }} {{ isset($enseignants->libelle_statu) ? $enseignants->libelle_statu : "" }} </td>
				      	<td>{{ isset($enseignants->libelle) ? $enseignants->libelle : "" }}</td>
				      	<td>{{ isset($enseignants->date_prise_service) ? $enseignants->date_prise_service : "" }}</td>
				      	<td>{{ isset($enseignants->adresse) ? $enseignants->adresse : "" }} {{ isset($enseignants->num_tel) ? $enseignants->num_tel : "" }}</td>
				      
				    </tr>
				    @endforeach
				    @endif
				   
			  </tbody>
		</table>
			</div>
		</div>
		
	</div>
</body>
</html>
 