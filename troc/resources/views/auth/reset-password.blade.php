@extends('frontoffice.index')

@section('content')

<div id="user-login">
	<h2 class="title">Modifier Le Mot de passe !</h2>

	<form method="POST" action="{{ route('password.update') }}" class="form " id="form-user-login">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-icon marg-b-L">
            <i class="lni-user bg-icon large"></i>
            <input id="email" class="wanted width-100" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
        </div>

        <div class="input-icon marg-b-L">
            <i class="lni-lock bg-icon large"></i>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="width-90" />

                <i class="lni-question-circle xlarge vertical-middle text-color1 cursor opacity-50 opacity-hover-100" data-popup="<h3>Règles de sécurité</h3>
                 Nombre de caractères minimum : <strong>6</strong><br />
                 Nombre de caractères maximum : <strong>24</strong><br />
                 Doit contenir au minimum :<br /> &nbsp; &rarr; 1 lettre majuscule<br /> &nbsp; &rarr; 1 lettre minuscule<br /> &nbsp; &rarr; 1 chiffre<br /> Caractères spéciaux acceptés : <strong>@ _ - . ? ! *</strong>">
                </i>
        </div>

        <div class="input-icon marg-b-L">
            <i class="lni-lock bg-icon large"></i>

            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="width-90"/>

                <i class="lni-question-circle xlarge vertical-middle text-color1 cursor opacity-50 opacity-hover-100" data-popup="<h3>Règles de sécurité</h3>
                 Nombre de caractères minimum : <strong>6</strong><br />
                 Nombre de caractères maximum : <strong>24</strong><br />
                 Doit contenir au minimum :<br /> &nbsp; &rarr; 1 lettre majuscule<br /> &nbsp; &rarr; 1 lettre minuscule<br /> &nbsp; &rarr; 1 chiffre<br /> Caractères spéciaux acceptés : <strong>@ _ - . ? ! *</strong>">
                </i>
        </div>

        <div class="actions clearfix ">
            <button class="highlight float-left" type="submit" name="form_login" id="submit">{{ __('Reset Password') }}</button>
        </div>
      
	</form>
</div>



<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/User.EchangeService.1.css.css')}}" />
<script type="text/javascript">    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">    try {        var pageTracker = _gat._getTracker("UA-7375850-1");        pageTracker._trackPageview();    } catch(err) {}</script><!-- AdSense async --><script>    $("document").ready(function(){        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);        $(".adsbygoogle").each(function() { adsbygoogle.push(this) });    });</script>
@endsection