@extends ('../layout')

@section('content')
	<input type="hidden" value="{{ Route('remove_immobilier') }}" id="urls-remove-immobilier">
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
						<button type="button" class="btn btn-primary btn-sm" data-urls="{{ Route('load_form_immobilier') }}" data-save="{{ Route('save_immobilier') }}" id="nouveau-immobilier"><i class="fa fa-plus"></i>NOUVEAU IMMOBILIER</button><br>
					</div>
					<div class="col-md-5">
						<a type="button" class="btn btn-success btn-sm" href="{{ Route('imprimer_immobilier') }}"><i class="fa fa-print"></i> IMPRIMER</a>
					</div>
				</div>
			</div>
		</div>

		<hr>
		<table class="table table-striped table-bordered">
			  <thead>
			    <tr>
			    	<th class="text-center" scope="col">N°</th>
			      	<th class="text-center" scope="col">LIBELLE</th>
			      	<th class="text-center" scope="col">EFFECTIF TOTAL</th>
			      	<th class="text-center" scope="col">EFFECTIF BON ETAT</th>
			      	<th class="text-center" scope="col">EFFECTIF MAUVAIS ETAT</th>
			      	<th class="text-center" scope="col">ACTIONS</th>
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
				      	<td>{{ isset($immobiliers->total_immobilier) ? $immobiliers->total_immobilier : "" }}</td>
				      	<td>{{ isset($immobiliers->bon_immobilier) ? $immobiliers->bon_immobilier : "" }}</td>
				      	<td>{{ isset($immobiliers->mauvais_immobilier) ? $immobiliers->mauvais_immobilier : "" }}</td>
				      	<td>
				      		<button type="button" class="btn btn-primary btn-xs" id="[modif][immobilier][{{ isset($immobiliers->id) ? $immobiliers->id : 0 }}]" data-urls="{{ Route('load_form_immobilier') }}" data-save="{{ Route('save_immobilier') }}"><i class="fa fa-edit"></i></button>
				      		<button type="button" class="btn btn-danger btn-xs" id="[remove][immobilier][{{ isset($immobiliers->id) ? $immobiliers->id : 0 }}]" data-urls="{{ Route('remove_immobilier') }}"><i class="fa fa-trash"></i></button>
				      	</td>
				    </tr>
				    @endforeach
				    @endif
			  </tbody>
		</table>
	</div>
@endsection