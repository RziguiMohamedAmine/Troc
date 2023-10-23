
  @extends('frontoffice.index')

  @cloudinaryJS
        <!-- Styles -->
        @livewireStyles
@section('content')
<section id="main" class="clearfix">
        <main>
          {{ $slot }}
      </main>
</section>
      @endsection

      @vite(['resources/css/app.css', 'resources/js/app.js'])
   
      <script src={{mix('js/app.js')}}></script>

      <script>
          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      </script>     
      
      @livewireScripts
