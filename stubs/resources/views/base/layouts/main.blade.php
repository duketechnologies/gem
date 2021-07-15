<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.base.partials.head')
</head>
<body class="c-app flex-row align-items-center">

  @yield('header')

  <div class="container">
  @yield('content')
  </div>

{{--  @yield('before_scripts')--}}
{{--  @stack('before_scripts')--}}

  @include('admin.base.partials.scripts')

{{--  @yield('after_scripts')--}}
{{--  @stack('after_scripts')--}}

</body>
</html>
