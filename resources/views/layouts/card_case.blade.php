<div class="flex flex-col flex-grow flex-shrink w-full p-3 rounded-lg md:w-1/3">
    <div class="flex-1 overflow-hidden bg-white">
        <div class="@yield('card_case_bg_color') border-b-4 @yield('card_case_border_color') rounded-lg shadow-lg p-5">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-center">
                    <h5 class="font-bold uppercase">@yield('card_case_title')</h5>
                    <div class="flex items-center flex-column">
                        <p class="w-1/3 text-xs font-bold">Sulawesi Tengah</p>
                        <h3 class="w-1/3 text-3xl font-bold">@yield('local_case')
                        </h3>
                        <p class="rounded font-bold text-white @yield('card_case_new_bg_color') text-small w-1/5">
                            +@yield('local_new_case')</p>
                    </div>
                    <div class="flex flex-column items-left">
                        <p class="w-1/3 text-xs font-bold">Indonesia</p>
                        <p class="w-1/3 text-xs font-bold">@yield('nasional_case')</p>
                        <p class="w-1/3 font-bold text-red-100 rounded opacity-0 text-small">
                            +{{ $stats[sizeof($stats) - 1][trans('general.death')] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
