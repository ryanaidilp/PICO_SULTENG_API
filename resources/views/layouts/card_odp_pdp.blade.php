<div class="rounded-lg w-full md:w-1/2 p-3 flex flex-col flex-grow flex-shrinks">
    <div class="flex-1 bg-white overflow-hidden">
        <div class="bg-white rounded-lg p-5">
            <div class="flex flex-row items-center rounded-lg shadow-lg">
                <div class="flex-1 text-center">
                    <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                        <h5 class="font-bold uppercase text-gray-600">
                            @yield('card_title')
                        </h5>
                    </div>
                    <div class="flex flex-column items-center mt-4">
                        <div class="w-1/2">
                            <p>@yield('active_label')</p>
                            <h3 class="font-bold text-3xl">@yield('active_count')</h3>
                            <p class="text-xs text-gray-600">(@yield('active_percentage') %)</p>
                        </div>
                        <div class="w-1/2">
                            <p>@yield('finished_label')</p>
                            <h3 class="font-bold text-3xl">@yield('finished_count')</h3>
                            <p class="text-xs text-gray-600">
                                (@yield('finished_percentage') %)</p>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <p>Total</p>
                        <h3 class="font-bold text-3xl">@yield('total_case')</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
