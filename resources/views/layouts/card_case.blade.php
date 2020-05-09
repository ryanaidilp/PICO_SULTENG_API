<div class="rounded-lg w-full md:w-1/3 p-3 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white overflow-hidden">
        <div class="@yield('card_case_bg_color') border-b-4 @yield('card_case_border_color') rounded-lg shadow-lg p-5">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-center">
                    <h5 class="font-bold uppercase">@yield('card_case_title')</h5>
                    <div class="flex flex-column items-center">
                        <p class="font-bold text-xs w-1/3">Sulawesi Tengah</p>
                        <h3 class="font-bold text-3xl w-1/3">@yield('local_case')
                        </h3>
                        <p class="rounded font-bold text-white @yield('card_case_new_bg_color') text-small w-1/5">
                            +@yield('local_new_case')</p>
                    </div>
                    <div class="flex flex-column items-left">
                        <p class="font-bold text-xs w-1/3">Indonesia</p>
                        <p class="font-bold text-xs w-1/3">@yield('nasional_case')</p>
                        <p class="rounded font-bold text-red-100 text-small w-1/3 opacity-0">
                            +{{ $stats[sizeof($stats) - 1]->death }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
