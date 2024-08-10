@extends ('../layout')

@section('content')
	<input type="hidden" value="{{ Route('remove_enseignant') }}" id="urls-remove-enseignant">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				@if(session('success'))
					<div class="alert alert-success" role="alert ">
						{{session('success')}}
					</div>
				@endif	
			</div>
			<div class="col-md-5">
				<div class="row" style="  background-color: #f2f2f2; padding: 15px;border-radius: 5px;border: 1px solid gray;">
					<div class="col-md-7">
						<button type="button" class="btn btn-primary btn-sm" data-urls="{{ Route('load_form_enseignant') }}" data-save="{{ Route('save_enseignant') }}" id="nouveau-enseignant"><i class="fa fa-plus"></i> NOUVEAU ENSEIGNANT</button>
					</div>
					<div class="col-md-5">
						<a type="button" class="btn btn-success btn-sm" href="{{ Route('imprimer_enseignant') }}"><i class="fa fa-print"></i> IMPRIMER</a>
					</div>
				</div>
			</div>
		</div>

		<hr>
		<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			      	<th class="text-center" scope="col">CIN</th>
			      	<th class="text-center" scope="col">NOM</th>
			      	<th class="text-center" scope="col">PRENOMS</th>
			      	<th class="text-center" scope="col">DATE DE NAISSANCE</th>
			      	<th class="text-center" scope="col">SEXE</th>
			      	<th class="text-center" scope="col">ADRESSE</th>
			      	<th class="text-center" scope="col">FONCTION</th>
			      	<th class="text-center" scope="col">MATIERE</th>
			      	<th class="text-center" scope="col">PRISE DE SERVICE</th>
			      	<th class="text-center" scope="col">CONTACT</th>
			      	<th class="text-center" scope="col">ACTIONS</th>
			    </tr>
			  </thead>
			  <tbody>
			  		@if(isset($enseignant) && count($enseignant) > 0)
			  		@foreach($enseignant as $enseignants)
				    <tr>
				    	<td>{{ isset($enseignants->cin) ? $enseignants->cin : "" }}</td>
				    	<td>{{ isset($enseignants->nom) ? $enseignants->nom : "" }}</td>
				      	<td>{{ isset($enseignants->prenoms) ? $enseignants->prenoms : "" }}</td>
				      	<td>{{ isset($enseignants->date_nais) ? $enseignants->date_nais : "" }}</td>
				      	<td>{{ isset($enseignants->sexe) ? $enseignants->sexe : "" }}</td>
				      	<td>{{ isset($enseignants->adresse) ? $enseignants->adresse : "" }}</td>
				      	<td>{{ isset($enseignants->nom_fonction) ? $enseignants->nom_fonction : "" }}</td>
				      	<td>{{ isset($enseignants->libelle) ? $enseignants->libelle : "" }}</td>
				      	<td>{{ isset($enseignants->date_prise_service) ? $enseignants->date_prise_service : "" }}</td>
				      	<td>{{ isset($enseignants->num_tel) ? $enseignants->num_tel : "" }}</td>
				      	<td>
				      		<button type="button" class="btn btn-primary btn-xs" id="[modif][enseignant][{{ isset($enseignants->id) ? $enseignants->id : 0 }}]" data-urls="{{ Route('load_form_enseignant') }}" data-save="{{ Route('save_enseignant') }}"><i class="fa fa-edit"></i></button>
				      		<button type="button" class="btn btn-danger btn-xs" id="[remove][enseignant][{{ isset($enseignants->id) ? $enseignants->id : 0 }}]" data-urls="{{ Route('remove_enseignant') }}"><i class="fa fa-trash"></i></button>
				      	</td>
				    </tr>
				    @endforeach
				    @endif
			  </tbody>
		</table>
	</div>
@endsection