<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sponosr Site API {{(trim($__env->yieldContent('title'))) ? ' - ' : '' }}@yield('title')</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">var base_url = "<?= url('/') ?>";</script>
  </head>
  <body id="page-top" class="{{ !empty($body_class) ? $body_class : '' }}">
    <div id="wrapper">
      @if (Auth::check())
      @include('layouts.partials.sidebar')
      @endif
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          @if (Auth::check())
          @include('layouts.partials.top-navbar')
          @endif
          @yield('content')
        </div>
        @include('layouts.partials.footer')
      </div>
    </div>
    @include('layouts.partials.modal')
    @include('layouts.partials.script')
  </body>
</html>