{{--<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>--}}
@extends('frontoffice.index')

@section('content')

<form method="POST" action="{{ route('register') }}" class="form" id="form-user-register">
    @csrf
    <!-- Auth -->
    <div class="fields-box clearfix">
        <h3>Identifiants</h3>


        <div class="padd-b">
            <input type="text" id="name" class="width-100"
            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Username" />
        </div>

        <div class="padd-b">
            <input type="email" id="email" class="width-100"
            type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="adresse@email.com" maxlength="100" minlength="6" autocomplete="true" />
        </div>
        <div class="padd-b">
            <input type="email" id="Confirm-email" class="width-100"
            type="confemail" name="confemail" :value="old('email')" required autocomplete="username" placeholder="adresse@email.com" maxlength="100" minlength="6" autocomplete="true" />
        </div>


        <div class="padd-b">
            <input id="password" type="password" name="password" type="password" name="password" required autocomplete="new-password" minlength="6" class="width-60"
                   maxlength="24" required="required" placeholder="Mot de passe"
                   title="De 6 à 24 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre" />
            <span class="cursor text-color1 opacity-50 opacity-hover-100" data-popup="<h3>Règles de sécurité</h3>
                 Nombre de caractères minimum : <strong>6</strong><br />
                 Nombre de caractères maximum : <strong>24</strong><br />
                 Doit contenir au minimum :<br /> &nbsp; &rarr; 1 lettre majuscule<br /> &nbsp; &rarr; 1 lettre minuscule<br /> &nbsp; &rarr; 1 chiffre<br />Caractères spéciaux acceptés : <strong>@ _ - . ? ! *</strong>">
                <i class="lni-question-circle xlarge vertical-middle"></i>
            </span>
        </div>
        <div class="padd-b">
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez le mot de passe" class="width-60"
                   minlength="6" maxlength="24"
                   title="De 6 à 24 caractères, au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial" />
        </div>
    </div>



        <!-- CGV || Policy -->
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class="fields-box clearfix">
                <!-- CGV & Policy -->
            <span class="block float-left width-10">
                <input type="checkbox" name="terms" id="terms" required class="custom" />
                <label for="terms" class="">
                   
                </label>
            </span>
            <span class="block float-left width-90">
                je suis majeur, j'ai lu et j'accepte
                <a href="{{route('terms.show')}}" target="_blank" title="">les conditions générales</a>
                et <a href="{{route('policy.show')}}" target="_blank" title="">la politique de confidentialité du site</a></span>
            </span>
    </div>
        @endif

    <div class="g-recaptcha" data-sitekey="6LfprBkUAAAAAOMkbl_ENk9b-cprmkf751-quyOC"></div>

	<button type="submit" name="form_register" style="margin-bottom: 10rem" class="highlight inline-block marg-t"
            data-modal="Vous confirmez la création de votre compte ?">{{ __('Register') }}
	</button>

</form>

<div class="box-account-info box-account-free">
    <i class="lni-gift text-color1"></i>
    <h6>GRATUIT</h6>
    <div class="price text-color1"><span>0</span><sup>€</sup>/ An</div>
    <div class="marg-b-L">
        Une messagerie interne pour contacter les membres<br /><br />
        Votre profil dans les résultats<br />
        Connectez-vous régulièrement pour remonter dans les résultats<br /><br />
        Une Annonce maximum,<br />diffusée pendant 60 jours
    </div>
</div>

<div class="box-account-info box-account-premium">
    <i class="lni-medall text-color2"></i>
    <h6>PREMIUM</h6>
    <div class="price text-color2"><span>19</span><sup>€</sup>/ An</div>
    <div class="marg-b-L">
        Boostez votre Compte Gratuit en <strong class="inline-block relative text-color2">Compte Premium</strong><br /><br />
        <strong>
            <i class="lni-star-filled marg-r-XXS text-color2"></i><span>Votre profil mis en avant dans les résultats</span><br />
            Pour les services que vous proposez ou recherchez<br /><br />
            <i class="lni-star-filled marg-r-XXS text-color2"></i><span>25 Annonces simultanées et mises en avant</span><br />
            Jusqu'à 10 images par annonce
        </strong>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/User.EchangeService.1.css.css')}}" />



<script type="text/javascript">    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">    try {        var pageTracker = _gat._getTracker("UA-7375850-1");        pageTracker._trackPageview();    } catch(err) {}</script><!-- AdSense async --><script>    $("document").ready(function(){        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);        $(".adsbygoogle").each(function() { adsbygoogle.push(this) });    });</script>
@endsection