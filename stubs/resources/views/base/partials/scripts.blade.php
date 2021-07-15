{{--@if (config('backpack.base.scripts') && count(config('backpack.base.scripts')))--}}
{{--    @foreach (config('backpack.base.scripts') as $path)--}}
{{--    <script type="text/javascript" src="{{ asset($path).'?v='.config('backpack.base.cachebusting_string') }}"></script>--}}
{{--    @endforeach--}}
{{--@endif--}}

{{--@if (config('backpack.base.mix_scripts') && count(config('backpack.base.mix_scripts')))--}}
{{--    @foreach (config('backpack.base.mix_scripts') as $path => $manifest)--}}
{{--    <script type="text/javascript" src="{{ mix($path, $manifest) }}"></script>--}}
{{--    @endforeach--}}
{{--@endif--}}

{{--@include('backpack::inc.alerts')--}}
<script type="text/javascript" src="{{ mix('/js/admin.js') }}"></script>
