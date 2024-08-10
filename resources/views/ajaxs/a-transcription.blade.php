@extends ('../layout')

@section('content')
	<div class="container-fluid">
		
	<main class="container">
		<form method="GET" action="{{ Route('save_note') }}">
			<h5><strong><i><u>INFO DE L'ELEVE</u></i></strong></h5>
			@if($eleves and count($eleves)>0 )
			@foreach($eleves as $eleve)
			<div class="row">
				<div class="col-md-4">
					<table class="table table-striped">
						<tbody>
						    <tr>
						      <th scope="row" class="text-right" width="40%"><label for="id">IM et Classe:</label></th>
						      <td class="text-left" width="60%">
						      	<input type="hidden" name="id" value="{{ isset($eleve->id) ? $eleve->id:'' }}">
						      	<span name="im" class="form-control">{{ isset($eleve->id) ? $eleve->id:'' }}  @if($classe and count($classe)>0) @foreach($classe as $classes) @if($classes->id_classe == $eleve->id_classe) {{ $classes->nom_classe }} @endif @endforeach @endif</span></td>
						    </tr>
						   
						</tbody>
					</table>
				</div>
				<div class="col-md-8">
					<table class="table table-striped">
						<tbody>
						   	<tr>
						      <th scope="row" class="text-right" width="30%"><label for="nom">Nom et prénom(s):</label></th>
						      <td class="text-left" width="70%"><span type="text" name="nom" class="form-control" >{{ isset($eleve->nom) ? $eleve->nom:'' }}  {{ isset($eleve->prenoms) ? $eleve->prenoms:'' }}</span></td>
						    </tr>
						    
						</tbody>
					</table>
				</div>
			</div>
			@endforeach
			@endif
			<hr>
			<h5><strong><i><u>NOTE PAR MATIERE</u></i></strong></h5>
			<h6>* Langue: Allemand/Anglais/Russe/Espagnol</h6>
			<div class="row">
				@if($matier and count($matier)>0 )
				@foreach($matier as $matiers)
				<div class="col-md-6">
					<table  class="table table-striped">
						<tbody>
							<tr>
								<th scope="row" class="text-right" width="40%"><label for="malagasy">{{ isset($matiers->libelle) ? $matiers->libelle:"" }}:</label></th>
								<td class="text-right" width="60%">
									<input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2"name="{{ isset($matiers->name) ? $matiers->name:'' }}" class="form-control" required="Veuillez remplir ce champ!">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				@endforeach
				@endif
			</div>
			<input type="submit" class="btn btn-primary btn-sm" style="float: right;" value="Enregistrer"><br>
			
		</form>
	</main>
	<hr>
</div>

@endsection

<script type="text/javascript">
    function maxLengthCheck(object){
        if(object.value.length>object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
</script>