<div class="w-full pt-8 text-md text-center text-gray-500">
    @yield('card_small_title')
    <div class="w-full flex flex-col flex-grow flex-shrink h-50">
        <div class="flex-1 bg-white overflow-hidden">
            <a href="@yield('card_small_url')" target="_blank" class="flex flex-wrap no-underline hover:no-underline">
                <div class="items-center text-gray-600 text-base px-6 pb-5 mx-auto">
                    <img class="hover:shadow-lg transition-kit rounded-lg  object-contain"
                        style="height: 100px" src="@yield('card_small_image')" />
                </div>
            </a>
        </div>
    </div>
</div>

