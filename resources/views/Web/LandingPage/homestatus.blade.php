@extends('Web.LayoutPage.appAuth')
@section('title','Forgot Password')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-password"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    
                                    <h1 class="h4 text-gray-900 mb-2">
                                        <a href="{{ route('home') }}"><img class="mr-5" src="{{ asset('img/undo.png') }}" width="30px" alt=""></a>
                                        Back To Dashboard
                                    </h1>
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    {{ __('You are logged in!') }}
                                </div>
                                {{-- <hr> --}}
                                {{-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.html">Already have an account? Login!</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection

