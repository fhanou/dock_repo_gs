@extends ('../layout')

@section('content')
	<input type="hidden" value="{{ Route('remove_mobilier') }}" id="urls-remove-mobilier">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				@if(session('success'))
					<div class="alert alert-success" role="alert ">
						{{session('success')}}
					</div>
				@endif	
			</div>
			<div class="col-md-4">
				<div class="row" style="  background-color: #f2f2f2; padding: 15px;border-radius: 5px;border: 1px solid gray;">
					<div class="col-md-7">
						<button type="button" class="btn btn-primary btn-sm" data-urls="{{ Route('load_form_mobilier') }}" data-save="{{ Route('save_mobilier') }}" id="nouveau-mobilier"><i class="fa fa-plus"></i>	NOUVEAU MOBILIER</button>
					</div>
					<div class="col-md-5">
						<a type="button" class="btn btn-success btn-sm" href="{{ Route('imprimer_mobilier') }}"><i class="fa fa-print"></i> IMPRIMER</a>
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
			  		@if(isset($mobilier) && count($mobilier) > 0)
			  		@php
			  			$i = 0;
			  		@endphp
			  		@foreach($mobilier as $mobiliers)
			  		@php
			  			$i ++;
			  		@endphp
				    <tr>
				    	<td>{{ $i }}</td>
				    	<td>{{ isset($mobiliers->libelle_mobilier) ? $mobiliers->libelle_mobilier : "" }}</td>
				      	<td>{{ isset($mobiliers->total_mobilier) ? $mobiliers->total_mobilier : "" }}</td>
				      	<td>{{ isset($mobiliers->bon_mobilier) ? $mobiliers->bon_mobilier : "" }}</td>
				      	<td>{{ isset($mobiliers->mauvais_mobilier) ? $mobiliers->mauvais_mobilier : "" }}</td>
				      	<td>
				      		<button type="button" class="btn btn-primary btn-xs" id="[modif][mobilier][{{ isset($mobiliers->id) ? $mobiliers->id : 0 }}]"  data-urls="{{ Route('load_form_mobilier') }}" data-save="{{ Route('save_mobilier') }}"><i class="fa fa-edit"></i></button>
				      		<button type="button" class="btn btn-danger btn-xs" id="[remove][mobilier][{{ isset($mobiliers->id) ? $mobiliers->id : 0 }}]" data-urls="{{ Route('remove_mobilier') }}" ><i class="fa fa-trash"></i></button>
				      	</td>
				    </tr>
				    @endforeach
				    @endif
			  </tbody>
		</table>
	</div>
@endsection