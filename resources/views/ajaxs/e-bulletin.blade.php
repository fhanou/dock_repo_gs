@extends ('../layout')

@section('content')
<div class="container-fluid">
	<main class="container">
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
			@if($eleves and count($eleves)>0 )
			@foreach($eleves as $eleve)
			<div class="col-md-12">
				<label for="id">Nom et Prénoms : {{ isset($eleve->nom) ? $eleve->nom:'' }}   {{ isset($eleve->prenoms) ? $eleve->prenoms:'' }}</label> <br>
				<label for="id_classe">Date et lieu de naissance : {{ isset($eleve->date_nais) ? $eleve->date_nais:'' }}   à  {{ isset($eleve->lieu_nais) ? $eleve->lieu_nais:'' }}</label><br>
				<label for="id">Classe : @if($classe and count($classe)>0) @foreach($classe as $classes) @if($classes->id_classe == $eleve->id_classe) {{ $classes->nom_classe }} @endif @endforeach @endif IM: {{ isset($eleve->id) ? $eleve->id:'' }}  Sexe:{{ isset($eleve->sexe) ? $eleve->sexe : '' }}  {{ isset($eleve->status) ? $eleve->status : "" }}</label> <br>
			</div>
			@endforeach
			@endif		      	
			<table class="table table-bordered">
			  	<thead>
			    	<tr>
				    	<th class="text-center" scope="col">MATIERES</th>
				    	<th class="text-center" scope="col">N.I.1</th>
				    	<th class="text-center" scope="col">N.I.2</th>
				      	<th class="text-center" scope="col">MOYENNE</th>
				      	<th class="text-center" scope="col">COEF</th>
				      	<th class="text-center" scope="col">TOTAL</th>
			    	</tr>
			  	</thead>
			  	<tbody>

			  	@php
			  		$total = 0;
			  		$total_coef = 0;
			  	@endphp

			  	@if($matier and count($matier)>0 )
				@foreach($matier as $matiers)
					@if($pnote and count($pnote)>0 )
					@foreach($pnote as $pnotes)
						@if($dnote and count($dnote)>0 )
						@foreach($dnote as $dnotes)
						   	<tr>
						    	<td class="text-center">{{ isset($matiers->libelle) ? $matiers->libelle:"" }}</td>
						    	<td class="text-center">{{ isset($pnotes->{$matiers->cles}) ? $pnotes->{$matiers->cles} : "" }}</td>
						    	<td class="text-center">{{ isset($dnotes->{$matiers->cles}) ? $dnotes->{$matiers->cles} : "" }}</td>
						    	@php
						    		$note = ($pnotes->{$matiers->cles} + $dnotes->{$matiers->cles});
						    		$moyenne = $note/2;
						    		$stotal = $moyenne * (isset($matiers->coef) ? $matiers->coef: 0);
									$total += $stotal;
									$total_coef += $matiers->coef;
									$moyenne_eleve = $total / $total_coef;
		      		   		
						    	@endphp
						      	<td class="text-center">{{ isset($moyenne) ? $moyenne: "" }}</td>
						      	<td class="text-center">{{ isset($matiers->coef) ? $matiers->coef: "" }}</td>
						      	<td class="text-center">{{ isset($stotal) ? $stotal: 0 }}</td>
							</tr>
						@endforeach
						@endif
					@endforeach
					@endif
				@endforeach
				@endif
				
			  	</tbody>
			</table>
		</div>
		<div class="row">
				
			<div class="col-md-6">	
				<label>Total des notes : {{ $total }}</label> <br>
				<label for="id">Total des coefficients :{{ $total_coef }} </label> <br>
				<label for="id">Moyenne de l'élève :{{$moyenne_eleve}} </label> <br>
			</div>

		</div>
	</main>
	<hr>
</div>

@endsection