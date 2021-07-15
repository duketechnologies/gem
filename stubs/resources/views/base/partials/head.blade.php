    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ isset($title) ? $title.' | '.config('admin.project_name') : config('admin.project_name') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ mix('/css/admin.css') }}">

{{--    @yield('before_styles')--}}
{{--    @stack('before_styles')--}}

{{--    @if (config('backpack.base.styles') && count(config('backpack.base.styles')))--}}
{{--        @foreach (config('backpack.base.styles') as $path)--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ asset($path).'?v='.config('backpack.base.cachebusting_string') }}">--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--    @if (config('backpack.base.mix_styles') && count(config('backpack.base.mix_styles')))--}}
{{--        @foreach (config('backpack.base.mix_styles') as $path => $manifest)--}}
{{--        <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--    @yield('after_styles')--}}
{{--    @stack('after_styles')--}}
