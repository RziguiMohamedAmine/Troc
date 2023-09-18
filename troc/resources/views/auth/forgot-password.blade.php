{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}












<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="{{asset('assets/backoffice/images/favicon.ico')}}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('assets/backoffice/plugins/morris/morris.css')}}">
    
        <link href="{{asset('assets/backoffice/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/backoffice/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/backoffice/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/backoffice/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
                <a href="{{route('welcome')}}" class="text-white"><i class="fas fa-home h2"></i></a>
            </div>
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">                             
                                <a href="{{route('welcome')}}" class="logo logo-admin"><img src="{{asset('assets/backoffice/images/logo-light.png')}}" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Reset Password</h5>
    
                        <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.email') }}">
                            @csrf
                               <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Enter your <b>Email</b> and instructions will be sent to you!
                                        </div>
                               </div>

                               @if (session('status'))
                               <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                   {{ session('status') }}
                               </div>
                              @endif

                                <div class="form-group">
                                        <div class="col-12">
                                                <label >{{ __('Email') }}</label>
                                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                        </div>
                                    </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Send Email</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->


        <script src="{{asset('assets/backoffice/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/backoffice/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/backoffice/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/backoffice/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/backoffice/js/waves.min.js')}}"></script>    
        <script src="{{asset('assets/backoffice/js/app.js')}}"></script>    

    </body>

</html>