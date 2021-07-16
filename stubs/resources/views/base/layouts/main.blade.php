<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.base.partials.head')
</head>
<body class="c-app">
  @include('admin.base.partials.sidebar')

  <div class="c-wrapper c-fixed-components">
    @include('admin.base.partials.header')

    <div class="c-body">
      <main class="c-main">
        <div class="container-fluid">
          <div class="fade-in">
            @yield('content')
          </div>
        </div>
      </main>
    </div>
  </div>

  @include('admin.base.partials.scripts')
</body>
</html>
