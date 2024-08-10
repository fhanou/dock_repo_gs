<!DOCTYPE html>
<html>
<head>
	<title>Liste Immobilier Scolaire</title>
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
		<h4 class="text-center">LISTE DES IMMOBILIERS SCOLAIRES</h4>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-bordered">
			  <thead>
			    <tr>
			    	<th class="text-center" scope="col" width="15%">N° IMMOBILIER</th>
			      	<th class="text-center" scope="col" width="40%">LIBELLE</th>
			      	<th class="text-center" scope="col" width="15%">EFFECTIF TOTAL</th>
			      	<th class="text-center" scope="col" width="15%">EFFECTIF BON ETAT</th>
			      	<th class="text-center" scope="col" width="15%">EFFECTIF MAUVAIS ETAT</th>
			      	
			    </tr>
			  </thead>
			  <tbody>
			  		
			  		@if(isset($immobilier) && count($immobilier) > 0)
			  		@php
			  			$i = 0;
			  		@endphp
			  		@foreach($immobilier as $immobiliers)
			  		@php
			  			$i ++;
			  		@endphp
				    <tr>
				    	<td>{{ $i }}</td>
				    	<td>{{ isset($immobiliers->libelle_immobilier) ? $immobiliers->libelle_immobilier : "" }}</td>
				      	<td class="text-center">{{ isset($immobiliers->total_immobilier) ? $immobiliers->total_immobilier : "" }}</td>
				      	<td class="text-center">{{ isset($immobiliers->bon_immobilier) ? $immobiliers->bon_immobilier : "" }}</td>
				      	<td class="text-center">{{ isset($immobiliers->mauvais_immobilier) ? $immobiliers->mauvais_immobilier : "" }}</td>
				      
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
