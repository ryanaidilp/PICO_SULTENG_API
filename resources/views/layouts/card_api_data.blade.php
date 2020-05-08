<div class="hover:shadow-2xl rounded-lg w-full md:w-@yield('card_api_width') p-4 flex flex-col flex-grow flex-shrink transition-kit">
    <div class="flex-1 bg-white overflow-hidden">
        <a href="@yield('card_api_url')"
        target="_blank"
            class="flex flex-wrap no-underline hover:no-underline">
            <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6">
                DATA
            </p>
            <div class="w-full font-bold text-xl text-gray-800 px-6">
                <i>@yield('card_api_title')</i>
            </div>
            <p class="text-gray-600 text-base px-6 mb-5">
                @yield('card_api_caption')
            </p>
        </a>
    </div>
    <div class="flex-none mt-auto bg-white overflow-hidden p-6">
        <div class="flex items-center justify-start">
            <a href="@yield('card_api_url')"
            target="_blank"
                class="gradient2 mx-auto lg:mx-0 hover:underline gradient2 text-gray-300 font-extrabold rounded my-6 py-4 px-8 shadow-lg">
                Tekan Disini
            </a>
        </div>
    </div>
</div>
