@extends('layouts.app_b')

@section('content')

<div class="container centerfull">

    <div class="content-center ">

        <div class="col-md-12">
            <div class="card login-form ">
                <div class="card-body mb-10" id='lg_screen'>
                   
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="etiqueta" >

                            <div class="row py-4 mb-5 ml-2">
                                <div class="col-md-12">
                                        <img src="theme/dist/img/logo.png" alt="" width="270" height="150">
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="email" class="col-sm-4 col-form-label">{{ __('Correo electronico') }}</label> --}}
                                <div class="col-md-12" style="margin-left: 24%;">
    
                                    <div class="input-group mb-3 w-50">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text span-input-login" id="basic-addon1"><i class="far fa-user"></i></span>
                                        </div>
                                        <input placeholder='ejemplo@ejemplo.com' oninvalid="this.setCustomValidity('Debe ingresar un correo electrinco')" id="email" type="email" class=" input-login form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
    
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row" >
                                {{-- <label for="password" class="col-md-4 col-form-label ">{{ __('Contraseña') }}</label> --}}
    
                                
                                <div class="col-md-12" style="margin-left: 24%;">
                                    <div class="input-group mb-3 w-50">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text span-input-login" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input id="password" type="password" class="input-login w-25 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    </div>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-12 text-center ">
                                    <button type="submit" class="btn btn-primary-pan" >
                                        {{ __('Ingresar') }}
                                    </button>
                               
                                </div>
                            </div>

                            <div class="opciones-login">
                                <div class="form-group row mt-2">
                                    <div class="col-md-12 text-center">
                                        <a click="switch_login_screen(1)" class='a-pan' type='1' href="#">No tienes cuenta? Registrate  <i class="fas fa-user-plus"></i> </a>
                                    </div>
                                </div>
        
                                <div class='row' >
                                    <div class="col-md-12 text-center mb-3" >
                                        <a id='rememberpw' type='2' href="#">Olvid&oacute; su contrase&ntilde;a? Restablecer <i class="fas fa-lock-open"></i></a>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-12 text-center ">
                                        <button onclick="location.href = '/clientes' " type="button" class="btn btn-primary-pan" >
                                            {{ __('Reservar sin registro') }}
                                        </button>
                                
                                    </div>
                                </div>
                                
                                <div class='row' >
                                    <div class="col-md-12 text-center mb-2" >
                                            
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>


                      
                    </form>
                   
                </div>

                

                <div class="card-body mb-10" style='display:none;' id='rg_screen'>
                    <form method="POST" action="{{ url ('register') }}" >
                        @csrf

                        <div class="etiqueta" >

                            <div class="px-5" >

                                <div class="form-group row text-center">
                                    <div class="col-md-12 text-center py-4 mb-5 ml-2">
                                        <img src="theme/dist/img/logo.png" alt="" width="270" height="150">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label text-left">{{ __('Nombre usuario') }}</label>
                                    <div class="col-md-8">
                                        <input oninvalid="this.setCustomValidity('Por favor llene este campo')" id="username" type="text" class=" input-login form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-left">{{ __('Correo electronico') }}</label>
        
                                    <div class="col-md-8">
                                        <input oninvalid="this.setCustomValidity('Por favor llene este campo')" id="email_r" type="email" class=" input-login form-control{{ $errors->has('email_r') ? ' is-invalid' : '' }}" name="email_r" value="{{ old('email_r') }}" required autofocus>
        
                                        @if ($errors->has('email_r'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email_r') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="passwd_r" class="col-sm-4 col-form-label text-left">{{ __('Contraseña') }}</label>
                                    <div class="col-md-8">
                                        <input oninvalid="this.setCustomValidity('Por favor llene este campo')" id="passwd" type="password" class="input-login form-control{{ $errors->has('passwd') ? ' is-invalid' : '' }}" name="passwd" value="{{ old('passwd') }}" required autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="passwd_r2" class="col-md-4 col-form-label text-left">{{ __('Confirmar contraseña') }}</label>
        
                                    <div class="col-md-8">
                                        <input oninvalid="this.setCustomValidity('Por favor llene este campo')" id="passwd_r2" type="password" class="input-login form-control{{ $errors->has('passwd_r2') ? ' is-invalid' : '' }}" name="passwd_r2" required>
        
                                        @if ($errors->has('passwd_r2'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('passwd_r2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row" style='display:none' id='error'>
                                    <div class="col-md-12">
                                    <em class='text-danger'></em>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary-pan w-100" id='rg'>
                                            {{ __('Registrarse') }}
                                        </button>
                                   
                                    </div>
                                </div>
        
                                <div class="form-group row mt-2 opciones-login">
                                    <div class="col-md-12 text-right mb-5">
                                        <a type='2' href="#">Ya tienes una cuenta? Ingresa aqui</a>
                                    </div>
                                </div>
                            </div>


                        </div>

             
                    </form>
                    
                </div>

                <div class="card-body mb-10" style='display:none;' id='rp_screen'>


                    <div class="etiqueta" >
                        <div class="px-5">

                            <div class="form-group row text-center">
                                <div class="col-md-12 text-center py-4 mb-2 ml-2">
                                    <img src="theme/dist/img/logo.png" alt="" width="270" height="150">
                                </div>
                            </div>
                                
        
                            <div class="row " >
                                <div class="col-md-12 mt-3" >
                                    <h5>Para recuperar la contrase&ntilde;a de su cuenta por favor escriba el correo electronico con el cual se registr&oacute; en el sistema.</h5>
                                </div>
                                <div class="col-md-12 mt-3 w-100" >
                                </div>
                            </div>
        
                            <div class="row my-10 text-center " >
                                <div class="col-md-12" >
                                    {!! Form::email("email_rec", null, ["class"=>"input-login form-control","placeholder"=>"sucorreo@correo.com"]) !!}
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12 mt-3" >
                                    {!! Form::button("Recuperar contraseña", ["class"=>"btn btn-primary-pan w-100","rpb"]) !!}
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-12 mt-3 text-right opciones-login mb-5" >
                                    <a type='2' href="#" >Regresar</a>
                                </div>
                            </div>

                        </div>


                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    {!! Html::script('theme/dist/js/users/users.js') !!}
    <script type="text/javascript" >
            @if(Session::has('message-error'))
    
            swal({
                type: 'error',
                title: 'Oops...',
                text: '{{Session::get('message-error')??'Transacción errónea'}}',
                footer: '<a href>Why do I have this issue?</a>',
            })

            @php
            Session::forget('message-error');
            @endphp
            @endif

            @if(Session::has('message-success'))
    
            swal({
                title: 'Información',
                type: 'success',
                text: '{{Session::get('message-success')}}',
            })

            @php
            Session::forget('message-error');
            @endphp
            @endif

    </script>
@endsection