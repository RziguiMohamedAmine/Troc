{{--<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>




    </x-authentication-card>
</x-guest-layout>
--}}




@extends('frontoffice.index')

@section('content')

<div id="user-login">
	<h2 class="title">Connectez-vous !</h2>
	<form method="POST" action="{{ route('login') }}" class="form " id="form-user-login">
        @csrf
        <div class="input-icon marg-b-L">
            <i class="lni-user bg-icon large"></i>
            <input type="email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="wanted width-100" placeholder="Adresse email" maxlength="100" autocomplete="true" />
        </div>

        <div class="input-icon marg-b-L">
            <i class="lni-lock bg-icon large"></i>
            <input type="password" id="password" type="password" name="password" required autocomplete="current-password" size="14" required class="width-90" placeholder="Mot de passe" maxlength="24" />
                <i class="lni-question-circle xlarge vertical-middle text-color1 cursor opacity-50 opacity-hover-100" data-popup="<h3>Règles de sécurité</h3>
                 Nombre de caractères minimum : <strong>6</strong><br />
                 Nombre de caractères maximum : <strong>24</strong><br />
                 Doit contenir au minimum :<br /> &nbsp; &rarr; 1 lettre majuscule<br /> &nbsp; &rarr; 1 lettre minuscule<br /> &nbsp; &rarr; 1 chiffre<br /> Caractères spéciaux acceptés : <strong>@ _ - . ? ! *</strong>">
                </i>
        </div>

        @if ($errors->any())
    <div class="alert alert-danger" style="text-align: center; color: red; padding-bottom: 15px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
        
        <div class="form-group">
            <div class="col-12">
                <div class="checkbox checkbox-primary">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="remember_me" name="remember" class="custom-control-input" style="margin-bottom: 25px"/>
                        <label class="custom-control-label" for="remember_me">{{ __('Remember me') }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions clearfix ">
            <button class="highlight float-left" type="submit" name="form_login" id="submit">{{ __('Log in') }}</button>
            @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="float-right"><i class="fa fa-lock m-r-5"></i>{{ __('Forgot your password?') }}</a>
                @endif
        </div>
        {{-- <div class="form-group row m-t-30 m-b-0">
            <div class="float-right">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-muted">Create an account</a>
                @endif
            </div>
        </div> --}}
	</form>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/User.EchangeService.1.css.css')}}" />



<script type="text/javascript">    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">    try {        var pageTracker = _gat._getTracker("UA-7375850-1");        pageTracker._trackPageview();    } catch(err) {}</script><!-- AdSense async --><script>    $("document").ready(function(){        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);        $(".adsbygoogle").each(function() { adsbygoogle.push(this) });    });</script>
@endsection