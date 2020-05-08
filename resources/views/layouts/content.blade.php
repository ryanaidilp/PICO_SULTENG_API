<section class="bg-white border-b py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-2">
        <h2 class="w-full my-2 md:text-3xl text-md font-black leading-tight text-center text-gray-800">
            @yield('content_title')
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        @yield('content_body')
    </div>
</section>
