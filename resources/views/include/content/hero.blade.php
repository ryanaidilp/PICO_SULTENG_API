<div class="container h-screen mx-auto">
    <div class="px-3 text-center lg:px-0">
        <h1 class="my-4 text-2xl font-black leading-tight text-white md:text-3xl lg:text-5xl">
            PICO SulTeng API
        </h1>
        <p class="mb-8 text-base leading-normal text-gray-100 md:text-xl lg:text-2xl">
            @lang('home.api_hero')
        </p>

        <a href="
        @if(app('translator')->getLocale() != 'id')
        https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/README.md
        @else
        https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/README.id.md
        @endif
        " class="w-48 px-8 py-4 mx-auto my-2 font-bold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline md:my-6">
            {{ __('home.documentation') }}
        </a>
    </div>

    <img src="{{ $path }}" class="flex items-center content-end flex-1 mx-auto browser-mockup w-90 md:w-1/2" lazy />
</div>
