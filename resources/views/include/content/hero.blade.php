<div class="container mx-auto h-screen">
    <div class="text-center px-3 lg:px-0">
        <h1 class="my-4 text-2xl md:text-3xl text-white lg:text-5xl font-black leading-tight">
            PICO SulTeng API
        </h1>
        <p class="leading-normal text-gray-100 text-base md:text-xl lg:text-2xl mb-8">
            @lang('home.api_hero')
        </p>

        <a href=
        "
        @if(app('translator')->getLocale() != 'id')
        https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/README.md
        @else
        https://github.com/RyanAidilPratama/PICO_SULTENG_API/blob/master/README.id.md
        @endif
        "
            class="gradient2 mx-auto lg:mx-0 hover:underline text-gray-300 font-bold rounded my-2 md:my-6 py-4 px-8 shadow-lg w-48">
            {{ __('home.documentation') }}
        </a>
    </div>

    <img src="{{ $path }}" class="browser-mockup flex flex-1 w-90 md:w-1/2 items-center mx-auto content-end" lazy />
</div>
