<div class="w-full p-3">
    <!--Table Card-->
    <div class="bg-white border-transparent rounded-lg shadow-lg">
        <div
            class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase md:text-3xl text-gray-600">@yield('table_title')</h5>
        </div>
        <div class="p-5">
            @yield('table_content')
        </div>
    </div>
    <!--/table Card-->
</div>
