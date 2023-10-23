@extends('frontoffice.index')

@section('content')

<div id="user-login">
	<h2 class="title">Connectez-vous !</h2>
	<form method="POST" action="{{ route('password.email') }}" class="form">
        @csrf

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
       @endif

        <div class="input-icon marg-b-L">
            <i class="lni-user bg-icon large"></i>
            <input type="email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="wanted width-100" placeholder="Adresse email" maxlength="100" autocomplete="true" />
        </div>
        <div class="actions clearfix ">
            <button class="highlight float-left" type="submit" >Send Email</button>
        </div>
	</form>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/User.EchangeService.1.css.css')}}" />



<script type="text/javascript">    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">    try {        var pageTracker = _gat._getTracker("UA-7375850-1");        pageTracker._trackPageview();    } catch(err) {}</script><!-- AdSense async --><script>    $("document").ready(function(){        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);        $(".adsbygoogle").each(function() { adsbygoogle.push(this) });    });</script>
@endsection