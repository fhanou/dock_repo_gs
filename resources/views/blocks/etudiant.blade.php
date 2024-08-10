@extends ('../layout')

@section('content')
	<input type="hidden" value="{{ Route('remove_eleve') }}" id="urls-remove-eleve">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@if(session('success'))
					<div class="alert alert-success" role="alert ">
						{{session('success')}}
					</div>
				@endif
			</div>
			<div class="col-md-6">

				<div class="row" style="  background-color: #f2f2f2; padding: 15px;border-radius: 5px;border: 1px solid gray;">
					<div class="col-md-5">
						<br>
						<h6> </h6>
						<button type="button" class="btn btn-primary btn-sm" data-suivant-urls="{{ Route('load_form_suivant_eleve') }}" data-urls="{{ Route('load_form_eleve') }}" data-save="{{ Route('save_eleve') }}" id="nouveau-eleve"><i class="fa fa-plus"></i>	NOUVEAU ETUDIANT</button>
					</div>

					<div class="col-md-7">
						<label>CLASSE:</label>
						
						<form action="{{ Route('imprimer_eleve') }}" method="GET">
							
							<div class="row">
								
									<div class="form-group" >
										<select name="classe" class="form-control" autofocus>
						                    @if (isset($class) and count($class) > 0)
						                        @foreach($class as $classe)
						                        @php
						                            $classe_ids = $classe->id_classe;
						                        @endphp
						                        <option value="{{ $classe->id_classe ? $classe->id_classe : '' }}" >{{ $classe->nom_classe ? $classe->nom_classe : '' }}</option>
						                        @endforeach
						                    @endif
						                </select>
									</div>   		                
						       
						        
						        	<div class="form-group" style="margin-left: 20px;">
						        		<button type="submit" class="btn btn-success btn-sm" href="{{ Route('imprimer_eleve') }}"  style="float: right;"><i class="fa fa-print">Imprimer</i></button> 
						        	</div>	            	
						     
						       	
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<hr>
		<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			    	<th class="text-center" scope="col">IM</th>
			    	<th class="text-center" scope="col">CLASSE</th>
			      	<th class="text-center" scope="col">NOM</th>
			      	<th class="text-center" scope="col">PRENOM</th>
			      	<th class="text-center" scope="col">DATE DE NAISSANCE</th>
			      	<th class="text-center" scope="col">LIEU DE NAISSANCE</th>
			      	<th class="text-center" scope="col">ADRESSE</th>
			      	<th class="text-center" scope="col">SEXE</th>
			      	<th class="text-center" scope="col">STATUS</th>
			      	<th class="text-center" scope="col">DATE D'ENTREE</th>
			      	<th class="text-center" scope="col">ACTIONS</th>
			    </tr>
			  </thead>
			  <tbody>
			  		@if(isset($eleve) && count($eleve) > 0)
			  		@foreach($eleve as $eleves)
				    <tr>
				    	<td>{{ isset($eleves->id) ? $eleves->id : "" }}</td>
				    	<td>{{ isset($eleves->nom_classe) ? $eleves->nom_classe : "" }}</td>
				      	<td>{{ isset($eleves->nom) ? $eleves->nom : "" }}</td>
				      	<td>{{ isset($eleves->prenoms) ? $eleves->prenoms : "" }}</td>
				      	<td>{{ isset($eleves->date_nais) ? $eleves->date_nais : "" }}</td>
				      	<td>{{ isset($eleves->lieu_nais) ? $eleves->lieu_nais : "" }}</td>
				      	<td>{{ isset($eleves->adresse) ? $eleves->adresse : "" }}</td>
				      	<td>{{ isset($eleves->sexe) ? $eleves->sexe : "" }}</td>
				      	<td>{{ isset($eleves->status) ? $eleves->status : "" }}</td>
				      	<td>{{ isset($eleves->date_entree) ? $eleves->date_entree : "" }}</td>
				      	<td>
				      		<button type="button" class="btn btn-primary btn-xs" id="[modif][eleve][{{ isset($eleves->id) ? $eleves->id : 0 }}]" data-suivant-urls="{{ Route('load_form_suivant_eleve') }}" data-urls="{{ Route('load_form_eleve') }}" data-save="{{ Route('save_eleve') }}"><i class="fa fa-edit"></i></button>
				      		<button type="button" class="btn btn-danger btn-xs" id="[remove][eleve][{{ isset($eleves->id) ? $eleves->id : 0 }}]" data-urls="{{ Route('remove_eleve') }}"><i class="fa fa-trash"></i></button>
				      	</td>
				    </tr>
				    @endforeach
				    @endif
			  </tbody>
		</table>
	</div>
@endsection