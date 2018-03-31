@extends('layouts.app')

@section('content')


@php
	$url = '';
	if(!empty($posts) && $action == 'edit'){
		$btn 		  		= 'Editar';
		$btn_color		= 'btn-warning';
		$method_field = 'PUT';
		$url 		  		= app(\App\Http\Controllers\EncryptDencryptController::class)->encrypt($posts[0]->id);
		$card_header  = 'Edit';
	}
	elseif(!empty($posts) && $action == 'delete'){
		$btn 		  		= 'Excluir';
		$btn_color		= 'btn-danger';
		$method_field = 'DELETE';
		$url 		  		= app(\App\Http\Controllers\EncryptDencryptController::class)->encrypt($posts[0]->id);
		$card_header  = 'Delete';
	}
	elseif(empty($posts)){
		$btn 		  		= 'Insert';
		$btn_color		= 'btn-success';
		$method_field = 'POST';
		$card_header  = 'Insert';
	}

@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $card_header.' User' }} <a class="btn btn-xs btn-link pull-right" href="{{ URL::to('/user_list') }}">Voltar</a></div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::to('/user_action/'.$url) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$posts[0]->name or ''}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$posts[0]->email or ''}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" name="role" class="form-control" required>
																	<option value="A" @if($posts[0]->role == 'A') selected @endif >Administrador</option>
                                  <option value="C" @if($posts[0]->role == 'C') selected @endif >Comum</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn {{ $btn_color }}">
                                     {{ $btn }}
                                </button>
                            </div>
                        </div>
                        {{ method_field($method_field) }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
