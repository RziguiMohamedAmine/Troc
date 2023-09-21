{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-label for="code" value="{{ __('Code') }}" />
                    <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-button class="ml-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout> --}}










@extends('frontoffice.index')

@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #6b7280;
        }

        .text-gray-900 {
            color: #111827;
        }

        .underline {
            text-decoration: underline;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .block {
            display: block;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .w-full {
            width: 100%;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .hover:text-gray-900:hover {
            color: #111827;
        }

        /* Add more CSS styles as needed */

    </style>

    <div class="container">
        <div class="mb-4 text-sm text-gray-600">
            Please confirm access to your account by entering the authentication code provided by your authenticator application.
        </div>

        <div class="mb-4 text-sm text-gray-600" style="display: none;">
            Please confirm access to your account by entering one of your emergency recovery codes.
        </div>

        <!-- Validation errors can be displayed here -->
        @if ($errors->any())
    <div class="alert alert-danger" style="text-align: start; color: red; padding-bottom: 1rem">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf

            <div class="mt-4">
                <label for="code">Code</label>
                <input id="code" class="custom-control-input" type="text" inputmode="numeric" name="code" autofocus />
            </div>

            <div class="flex items-center justify-end" style="margin-top: 15px">
                <button class="ml-4">Log in</button>
            </div>
        </form>
    </div>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/User.EchangeService.1.css.css')}}" />



    <script type="text/javascript">    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">    try {        var pageTracker = _gat._getTracker("UA-7375850-1");        pageTracker._trackPageview();    } catch(err) {}</script><!-- AdSense async --><script>    $("document").ready(function(){        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);        $(".adsbygoogle").each(function() { adsbygoogle.push(this) });    });</script>



@endsection











