<!DOCTYPE html>
<html>
	<head>
		<title>Liste Eleve</title>
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
							   

							    <th  scope="row"class="text-center"> 
							      	
							      	<p>ANNEE SCOLAIRE: 2022-2023</p>
						      	</th>
						    </tr>
						    @endforeach
							@endif
						</tbody>
					</table>
				</div>		
			</div>
		<div class="container-fluid">
		
			<h4 class="text-center">REGISTRE DES ELEVES </h4>
			
			<div class="row">
				<div class="col-md-6">
				<table class="table table-bordered" >
				<thead>
				    <tr>
				    	<th class="text-center" scope="col">IM</th>
				      	<th class="text-center" scope="col">NOM</th>
				      	<th class="text-center" scope="col">PRENOMS</th>
				      	<th class="text-center" scope="col">DATE DE NAISSANCE</th>
				      	<th class="text-center" scope="col">LIEU DE NAISSANCE</th>
				      	<th class="text-center" scope="col">ADRESSE</th>
				      	<th class="text-center" scope="col">SEXE</th>
				      	<th class="text-center" scope="col">STATUS</th>
				      	<th class="text-center" scope="col">DATE D'ENTREE</th>
				      	
				    </tr>
				</thead>
				<tbody>
					
			  		@if(isset($eleve) && count($eleve) > 0)
			  		@foreach($eleve as $eleves)
				    <tr>
				    	<td>{{ isset($eleves->id) ? $eleves->id : "" }}</td>
				    	<td>{{ isset($eleves->nom) ? $eleves->nom : "" }}</td>
				      	
				      	<td>{{ isset($eleves->prenoms) ? $eleves->prenoms : "" }}</td>
				      	<td>{{ isset($eleves->date_nais) ? $eleves->date_nais : "" }}</td>
				      	<td>{{ isset($eleves->lieu_nais) ? $eleves->lieu_nais : "" }}</td>
				      	<td>{{ isset($eleves->adresse) ? $eleves->adresse : "" }}</td>
				      	<td>{{ isset($eleves->sexe) ? $eleves->sexe : "" }}</td>
				      	<td>{{ isset($eleves->status) ? $eleves->status : "" }}</td>
				      	<td>{{ isset($eleves->date_entree) ? $eleves->date_entree : "" }}</td>
				      					      
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

