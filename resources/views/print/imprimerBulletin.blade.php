<!DOCTYPE html>
<html>
	<head>
		<title>Bulletin de note</title>
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	</head>
	<body>
		@php
			$moyen_total = 0;
		@endphp

		@if($note and count($note)>0 )
		@foreach($note as $dnote)
			@php
				$moyen_total += $dnote->grand_total / $dnote->total_coef;		
			@endphp
	    @endforeach
		@endif

		@php
			$moyen_class = $moyen_total / count($note);
		@endphp

		@php $i= 0; @endphp
		@if($note and count($note)>0 )
		@foreach($note as $dnote)
		@php $i++; @endphp
		<div class="container-fluid">
	  		<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
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
							      	<p>BULLETIN DE NOTE</p> <br>
							      	<p>ANNEE SCOLAIRE: 2022-2023</p>
						      	</th>
						    </tr>
						    @endforeach
							@endif
						</tbody>
					</table>
				</div>		
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="id">Nom et Prénoms : {{ isset($dnote->nom_eleve) ? $dnote->nom_eleve:'' }}   {{ isset($dnote->prenom_eleve) ? $dnote->prenom_eleve:'' }}</label> <br>
					<label for="id_classe">Date et lieu de naissance : {{ isset($dnote->nais_eleve) ? $dnote->nais_eleve:'' }}   à  {{ isset($dnote->lieu_eleve) ? $dnote->lieu_eleve:'' }}</label><br>
					<label for="id">Classe : {{ isset($dnote->classe_eleve) ? $dnote->classe_eleve : 0 }} IM: {{ isset($dnote->im_eleve) ? $dnote->im_eleve:'' }}  Sexe:{{ isset($dnote->sexe_eleve) ? $dnote->sexe_eleve : '' }}</label> <br>
				</div>
	      	
				<table class="table table-bordered">
				  	<thead>
				    	<tr>
					    	<th class="text-center" scope="col">MATIERES</th>
					    	<th class="text-center" scope="col">N.I.1</th>
					      	<th class="text-center" scope="col">N.I.2</th>
					      	<th class="text-center" scope="col">MOYENNE</th>
					      	<th class="text-center" scope="col">COEF</th>
					      	<th class="text-center" scope="col">TOTAL</th>
					      	<th class="text-center" scope="col">EMARGEMENT DES PROFS</th>
				    	</tr>
				  	</thead>
				  	<tbody>
						@if($matier and count($matier)>0 )
						@foreach($matier as $matiers)
						   	<tr>
						    	<td>{{ $matiers->libelle }}</td>
						    	<td class="text-center">{{isset ($dnote->{$matiers->cles."_1"})? $dnote->{$matiers->cles."_1"}:''}}</td>
						    	<td class="text-center">{{ isset ($dnote->{$matiers->cles."_2"})?$dnote->{$matiers->cles."_2"}:'' }}</td>
						    	<td class="text-center">{{ isset($dnote->{ "moyenne_".$matiers->cles})? $dnote->{ "moyenne_".$matiers->cles}:''}}</td>
						    	<td class="text-center">{{ isset($matiers->coef)?$matiers->coef:''}}</td>
						    	<td class="text-center">{{ isset($dnote->{ "total_note_".$matiers->cles})? $dnote->{ "total_note_".$matiers->cles}:''}}</td>
						    	<td class="text-center"></td>
							</tr>
						@endforeach
						@endif
				  	</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-md-6">
					@php
						$moyen = $dnote->grand_total / $dnote->total_coef;
						if ($moyen <10){
							$obs = 'Insuffisant';
						}
						else if($moyen>=10 and $moyen<12){
							$obs =  'Passable';
						}
						else if($moyen>=12 and $moyen<14){
							$obs =  'Assez bien';
						}
						else if($moyen>=14 and $moyen<16){
							$obs =  'Bien';
						}
						else if($moyen>=16 and $moyen<18){
							$obs =  'Très bien';
						}
						else if($moyen>18){
							$obs =  'Excellent';
						}
					@endphp
					<label for="id">Total des coefficients : {{ isset($dnote->total_coef)? $dnote->total_coef:''}}</label> <br>
					<label for="id">Moyenne de l'élève : {{ $moyen }}</label> <br>
					<label for="id">Rang : {{ $i }}</label> <br>
					
				</div>
				<div class="col-md-6">
					<label for="id">Total des notes : {{ $dnote->grand_total }}</label> <br>
					<label for="id">Moyenne de classe : {{ $moyen_class }}</label> <br>
					<label for="id">Observation :{{$obs}} </label> <br>
				</div>	
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	@endforeach
	@endif	
	</body>
</html>
