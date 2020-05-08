<div class="w-full md:w-@yield('chart_width') p-3">
    <!--Graph Card-->
    <div class="bg-white border-transparent rounded-lg shadow-lg">
        <div
            class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase text-gray-600">@yield('chart_title')</h5>
        </div>
        <div class="p-5">
            @yield('chart_content')
        </div>
    </div>
    <!--/Graph Card-->
</div>
