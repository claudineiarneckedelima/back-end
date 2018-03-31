@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">


				<div class="panel-heading">Lista de Usuários <a class="btn btn-xs btn-link pull-right" href="{{ URL::to('/user_register') }}">New</a></div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if(count($posts)>0)
						{{ $posts->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th width="200">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($posts as $any_variable)
								<tr>
								  <th scope="row">{{$any_variable->name}}</th>
								  <td align="center">
								  	<a class="btn btn-sm btn-warning" href="{{ URL::to('user_form/'.app(\App\Http\Controllers\EncryptDencryptController::class)->encrypt($any_variable->id.',edit')) }}">Editar</a>
								  	<a class="btn btn-sm btn-danger" href="{{ URL::to('user_form/'.app(\App\Http\Controllers\EncryptDencryptController::class)->encrypt($any_variable->id.',delete')) }}">Excluir</a>
								  </td>
								</tr>

							@endforeach


							</tbody>
						</table>
					@else
					<p> <div class="alert alert-success" role="alert"><strong>Vazio!</strong></div> </p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

	<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		   <div class="modal-content">
			 <div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Product</h4>
			</div>
			<div class="modal-body">
			<form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
				<div class="form-group error">
				 <label for="inputName" class="col-sm-3 control-label">Name</label>
				   <div class="col-sm-9">
					<input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
				   </div>
				   </div>
				 <div class="form-group">
				 <label for="inputDetail" class="col-sm-3 control-label">Details</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
					</div>
				</div>
			</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
			<input type="hidden" id="product_id" name="product_id" value="0">
			</div>
		</div>
	  </div>
	</div>-->




<!--<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($posts)>0)
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th>Name</th>
							  <th>Featured</th>
							  <th>Created At</th>
							  <th>Action</th>
							</tr>
						  </thead>
						  <tbody>

							@foreach($posts as $any_variable)
								<tr>
								  <th scope="row">{{$any_variable->name}}</th>
								  <td>{{str_replace('S','Sim',str_replace('N','Não',$any_variable->featured))}}</td>
								  <td>{{date( 'd/m/Y' , strtotime($any_variable->created_at))}}</td>
								  <td>
									<button class="btn btn-warning btn-detail open_modal" data-toggle="modal" data-target="#myModal" value="{{$any_variable->id}}">Editar</button>
             						<button class="btn btn-danger btn-delete delete-product" value="{{$any_variable->id}}" v-on:click="executaForm({{$any_variable->id}})">Excluir</button>
								  </td>
								</tr>

							@endforeach
						  </tbody>
						</table>
					@else
					<p> <div class="alert alert-success" role="alert"><strong>Vazio!</strong></div> </p>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	   <div class="modal-content">
		 <div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Product</h4>
		</div>
		<div class="modal-body">
		<form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
			<div class="form-group error">
			 <label for="inputName" class="col-sm-3 control-label">Name</label>
			   <div class="col-sm-9">
				<input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
			   </div>
			   </div>
			 <div class="form-group">
			 <label for="inputDetail" class="col-sm-3 control-label">Details</label>
				<div class="col-sm-9">
				<input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
				</div>
			</div>
		</form>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
		<input type="hidden" id="product_id" name="product_id" value="0">
		</div>
	</div>
  </div>
</div>-->


<!--<script src="{{asset('js/edition.js')}}"></script>-->


@endsection
