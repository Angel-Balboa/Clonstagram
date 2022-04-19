@extends('pagina-master')
@section('contenido')
    
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('do-login')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email/Username" id="txtEmail" name="email" class="form-control" required autofocus />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="txtPassword" name="password" placeholder="Password" class="form-control" required />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox"> 
                                    <label>
                                        <input type="checkbox" name="remember" />
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection