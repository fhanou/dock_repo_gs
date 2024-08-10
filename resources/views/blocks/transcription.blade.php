@extends ('../layout')
@section('content')
<form action="{{ Route('transcription_note') }}" method="GET">
	<div>
		<div class="col-md-12">		
			@if(session('error'))
				<div class="alert alert-danger" role="alert" style="text-align:center;">
					{{session('error')}}
				</div>
			@endif

			@if(session('success'))
					<div class="alert alert-success" role="alert " style="text-align:center;">
						{{session('success')}}
					</div>
				@endif				
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-3">
		        <select name="_e" class="form-control">
		            <option value="1" @if(isset($_etape) and $_etape == 1) selected="true" @endif>Note 1</option>
		            <option value="2" @if(isset($_etape) and $_etape == 2) selected="true" @endif>Note 2</option>
		        </select> 
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Recherche par IM" aria-label="Recipient's username" aria-describedby="basic-addon2" name="im" autofocus>
			  	<div class="input-group-append">
				    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

