<div class="w-full md:w-@yield('card_width') p-2 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white overflow-hidden hover:shadow-2xl rounded-lg @yield('transition')">
        <a href="@yield('card_url')" target="_blank" class="flex flex-wrap no-underline hover:no-underline">
            <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6">
                @yield('card_title')
            </p>
            <div class="w-full font-bold text-xl text-gray-800 px-6">
                <i>@yield('card_caption')</i>
            </div>
            <div class="items-center text-gray-600 text-base px-6 mb-5 mx-auto">
                <img class="object-contain w-full" src="@yield('card_image')" />
            </div>
        </a>
    </div>
</div>
