<!--Nav-->
<nav id="header" class="top-0 z-30 w-full py-1 text-white">
    <div class="container flex flex-wrap items-center justify-between w-full px-2 py-2 mx-auto mt-0 lg:py-6">
        <div class="flex items-center pl-4">
            <a class="flex items-center text-2xl font-bold text-white no-underline hover:no-underline lg:text-4xl" href="https://banuacoders.com/api/pico">
                <img src="https://i.ibb.co/rZJBLDt/PICO-Api-White.png" class="h-8 pr-2 text-blue-600 fill-current" /> PICO API
            </a>
        </div>


        <div class="flex content-center justify-end w-1/2">
            @if (app('translator')->getLocale() != 'id')
            <a class="inline-block h-10 p-2 pl-1 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4 md:pl-1" href="{{ route('home') }}">
                <img src="https://cdn.webshopapp.com/shops/94414/files/54029380/indonesia-flag-icon-free-download.jpg" class="h-5 hover:shadow-md" title="Lihat versi Bahasa Indonesia">
            </a>
            @else
            <a class="inline-block h-10 p-2 pr-1 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4 md:pr-1" href="{{ route('home') }}?lang=en">
                <img src="https://cdn.webshopapp.com/shops/94414/files/54956666/the-united-kingdom-flag-icon-free-download.jpg" class="h-5 hover:shadow-md" title="Switch to English version">
            </a>
            @endif
            <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" href="https://github.com/ryanaidilp/PICO_SULTENG_API" target="_blank" data-tippy-content="@github_handle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 fill-current" viewBox="0 0 32 32" version="1.1">
                    <title>{{ __('home.nav_github') }}</title>
                    <path d="M 16 0.394531 C 7.160156 0.394531 0 7.558594 0 16.394531 C 0 23.464844 4.585938 29.460938 10.941406 31.574219 C 11.738281 31.726562 12.035156 31.230469 12.035156 30.808594 C 12.035156 30.425781 12.019531 29.421875 12.011719 28.085938 C 7.5625 29.050781 6.625 25.941406 6.625 25.941406 C 5.894531 24.09375 4.84375 23.601562 4.84375 23.601562 C 3.394531 22.609375 4.957031 22.628906 4.957031 22.628906 C 6.5625 22.738281 7.40625 24.277344 7.40625 24.277344 C 8.832031 26.722656 11.152344 26.015625 12.066406 25.605469 C 12.210938 24.570312 12.621094 23.867188 13.078125 23.464844 C 9.527344 23.066406 5.792969 21.691406 5.792969 15.558594 C 5.792969 13.8125 6.410156 12.386719 7.4375 11.265625 C 7.257812 10.863281 6.71875 9.234375 7.578125 7.03125 C 7.578125 7.03125 8.917969 6.601562 11.980469 8.671875 C 13.257812 8.316406 14.617188 8.140625 15.980469 8.132812 C 17.339844 8.140625 18.699219 8.316406 19.980469 8.671875 C 23.019531 6.601562 24.359375 7.03125 24.359375 7.03125 C 25.21875 9.234375 24.679688 10.863281 24.519531 11.265625 C 25.539062 12.386719 26.160156 13.8125 26.160156 15.558594 C 26.160156 21.707031 22.417969 23.058594 18.859375 23.453125 C 19.417969 23.933594 19.9375 24.914062 19.9375 26.414062 C 19.9375 28.554688 19.917969 30.273438 19.917969 30.792969 C 19.917969 31.214844 20.199219 31.714844 21.019531 31.554688 C 27.421875 29.457031 32 23.457031 32 16.394531 C 32 7.558594 24.835938 0.394531 16 0.394531 " />
                </svg>
            </a>
            <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" data-tippy-content="@instagram_handle" target="_blank" href="https://instagram.com/banuacoders_">
                <svg id="icon-instagram" class="h-6 fill-current" viewBox="0 0 32 32">
                    <title>{{ __('home.nav_ig') }}</title>
                    <path d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z">
                    </path>
                    <path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z">
                    </path>
                    <path d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z">
                    </path>
                </svg>
            </a>
            <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" target="_blank" data-tippy-content="#facebook_id" href="https://www.facebook.com/banuacoders">
                <svg class="h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <title>{{ __('home.nav_fb') }}</title>
                    <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z" />
                </svg>
            </a>
            <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" target="_blank" data-tippy-content="@youtube_handle" href="https://www.youtube.com/channel/UC0SrBwl_lIlvR_wpYcmCG8w">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 fill-current" viewBox="0 0 32 32" version="1.1">
                    <title>{{ __('home.nav_yt') }}</title>
                    <path d="M 31.328125 8.273438 C 30.949219 6.921875 29.894531 5.867188 28.542969 5.488281 C 26.050781 4.820312 16.015625 4.820312 16.015625 4.820312 C 16.015625 4.820312 6.003906 4.808594 3.488281 5.488281 C 2.136719 5.867188 1.078125 6.921875 0.703125 8.273438 C 0.230469 10.824219 -0.00390625 13.417969 0.0078125 16.011719 C 0 18.597656 0.230469 21.179688 0.703125 23.722656 C 1.078125 25.074219 2.136719 26.132812 3.488281 26.507812 C 5.976562 27.175781 16.015625 27.175781 16.015625 27.175781 C 16.015625 27.175781 26.023438 27.175781 28.542969 26.507812 C 29.894531 26.132812 30.949219 25.074219 31.328125 23.722656 C 31.789062 21.179688 32.011719 18.597656 31.992188 16.011719 C 32.011719 13.417969 31.789062 10.828125 31.328125 8.273438 Z M 12.8125 20.800781 L 12.8125 11.210938 L 21.164062 16.011719 Z M 12.8125 20.800781 " />
                </svg>
            </a>

        </div>
    </div>
</nav>
