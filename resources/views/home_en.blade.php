<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PICO SulTeng API</title>
    <meta name="description" content="API for PICO (Pusat Informasi COVID-19/COVID-19 Information Center) of Central Sulawesi. This API build using
          microframework Lumen." />
    <meta name="keywords" content="api, pico, covid-19, sulawesi tengah, data covid, coronavirus" />
    <meta name="author" content="Fajrian Aidil Pratama" />

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <style>
        @import url("https://rsms.me/inter/inter.css");

        html {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji";
        }

        .gradient {
            background-image: linear-gradient(-225deg, #9db0b9 0%, #1695df 100%);
        }

        button,
        .gradient2 {
            background-color: #2c91a3;
            background-image: linear-gradient(315deg, #86e3f3 0%, #286dbb 74%);
        }

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

    </style>
</head>

<body class="flex flex-col leading-relaxed tracking-wide gradient">
    <!--Nav-->
    <nav id="header" class="top-0 z-30 w-full py-1 text-white lg:py-6">
        <div class="container flex flex-wrap items-center justify-between w-full px-2 py-2 mx-auto mt-0 lg:py-6">
            <div class="flex items-center pl-4">
                <a class="text-2xl font-bold text-white no-underline hover:no-underline lg:text-4xl" href="https://banuacoders.com/api/pico">
                    PICO API
                </a>
            </div>


            <div class="flex content-center justify-end w-1/2">
                <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" href="https://github.com/ryanaidilp/PICO_SULTENG_API" target="_blank" data-tippy-content="@github_handle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 fill-current" viewBox="0 0 32 32" version="1.1">
                        <title>See this project on GitHub</title>
                        <path d="M 16 0.394531 C 7.160156 0.394531 0 7.558594 0 16.394531 C 0 23.464844 4.585938 29.460938 10.941406 31.574219 C 11.738281 31.726562 12.035156 31.230469 12.035156 30.808594 C 12.035156 30.425781 12.019531 29.421875 12.011719 28.085938 C 7.5625 29.050781 6.625 25.941406 6.625 25.941406 C 5.894531 24.09375 4.84375 23.601562 4.84375 23.601562 C 3.394531 22.609375 4.957031 22.628906 4.957031 22.628906 C 6.5625 22.738281 7.40625 24.277344 7.40625 24.277344 C 8.832031 26.722656 11.152344 26.015625 12.066406 25.605469 C 12.210938 24.570312 12.621094 23.867188 13.078125 23.464844 C 9.527344 23.066406 5.792969 21.691406 5.792969 15.558594 C 5.792969 13.8125 6.410156 12.386719 7.4375 11.265625 C 7.257812 10.863281 6.71875 9.234375 7.578125 7.03125 C 7.578125 7.03125 8.917969 6.601562 11.980469 8.671875 C 13.257812 8.316406 14.617188 8.140625 15.980469 8.132812 C 17.339844 8.140625 18.699219 8.316406 19.980469 8.671875 C 23.019531 6.601562 24.359375 7.03125 24.359375 7.03125 C 25.21875 9.234375 24.679688 10.863281 24.519531 11.265625 C 25.539062 12.386719 26.160156 13.8125 26.160156 15.558594 C 26.160156 21.707031 22.417969 23.058594 18.859375 23.453125 C 19.417969 23.933594 19.9375 24.914062 19.9375 26.414062 C 19.9375 28.554688 19.917969 30.273438 19.917969 30.792969 C 19.917969 31.214844 20.199219 31.714844 21.019531 31.554688 C 27.421875 29.457031 32 23.457031 32 16.394531 C 32 7.558594 24.835938 0.394531 16 0.394531 " />
                    </svg>
                </a>
                <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" data-tippy-content="@instagram_handle" target="_blank" href="https://instagram.com/banuacoders_">
                    <svg id="icon-instagram" class="h-6 fill-current" viewBox="0 0 32 32">
                        <title>Follow us on Instagram</title>
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
                        <title>Like us on Facebook</title>
                        <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z" />
                    </svg>
                </a>
                <a class="inline-block h-10 p-2 text-center text-gray-300 no-underline hover:text-gray-800 hover:text-underline md:h-auto md:p-4" target="_blank" data-tippy-content="@youtube_handle" href="https://www.youtube.com/channel/UC0SrBwl_lIlvR_wpYcmCG8w">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 fill-current" viewBox="0 0 32 32" version="1.1">
                        <title>Subscribe us on YouTube</title>
                        <path d="M 31.328125 8.273438 C 30.949219 6.921875 29.894531 5.867188 28.542969 5.488281 C 26.050781 4.820312 16.015625 4.820312 16.015625 4.820312 C 16.015625 4.820312 6.003906 4.808594 3.488281 5.488281 C 2.136719 5.867188 1.078125 6.921875 0.703125 8.273438 C 0.230469 10.824219 -0.00390625 13.417969 0.0078125 16.011719 C 0 18.597656 0.230469 21.179688 0.703125 23.722656 C 1.078125 25.074219 2.136719 26.132812 3.488281 26.507812 C 5.976562 27.175781 16.015625 27.175781 16.015625 27.175781 C 16.015625 27.175781 26.023438 27.175781 28.542969 26.507812 C 29.894531 26.132812 30.949219 25.074219 31.328125 23.722656 C 31.789062 21.179688 32.011719 18.597656 31.992188 16.011719 C 32.011719 13.417969 31.789062 10.828125 31.328125 8.273438 Z M 12.8125 20.800781 L 12.8125 11.210938 L 21.164062 16.011719 Z M 12.8125 20.800781 " />
                    </svg>
                </a>

            </div>
        </div>
    </nav>

    <div class="container h-screen mx-auto">
        <div class="px-3 text-center lg:px-0">
            <h1 class="my-4 text-2xl font-black leading-tight text-white md:text-3xl lg:text-5xl">
                PICO SulTeng API
            </h1>
            <p class="mb-8 text-base leading-normal text-gray-100 md:text-xl lg:text-2xl">
                API for PICO (Pusat Informasi COVID-19/COVID-19 Information Center) of Central Sulawesi. This API
                build using
                microframework Lumen.
            </p>

            <a href="https://github.com/ryanaidilp/PICO_SULTENG_API/blob/master/README.md" class="w-48 px-8 py-4 mx-auto my-2 font-bold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline md:my-6">
                Getting Started!
            </a>
        </div>

        <div class="flex items-center w-full mx-auto">
            <div class="flex flex-1 w-1/2 m-6 md:px-0 md:m-12">
                <img src="{{ $path }}" />
            </div>
        </div>
    </div>

    <section class="py-12 bg-white border-b ">
        <div class="container flex flex-wrap items-center justify-between pb-12 mx-auto">

            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Description
            </h2>

            <div class="w-full mb-4">
                <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
            </div>

            <div class="flex flex-wrap items-center justify-between flex-1 max-w-4xl mx-auto text-gray-500 opacity-75">
                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/github/license/ryanaidilp/PICO_SULTENG_API?color=blue" alt="">
                </span>

                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/github/commit-activity/m/ryanaidilp/PICO_SULTENG_API" />
                </span>
                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/github/stars/ryanaidilp/PICO_SULTENG_API" alt="">
                </span>
                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/website?url=https%3A%2F%2Fbanuacoders.com%2Fapi%2Fpico" alt="">
                </span>
                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/github/last-commit/ryanaidilp/PICO_SULTENG_API" alt="">
                </span>
                <span class="flex items-center w-1/2 p-4 md:w-auto">
                    <img src="https://img.shields.io/badge/coverage-100%25-brightgreen" alt="">
                </span>

                <p class="px-6 mb-5 text-base text-gray-600">
                    This API was created to provide realtime data on the COVID-19 situation in Central Sulawesi
                    because the data provided by the local government is still in the form of static data so that
                    the data cannot be used in my application (PICO).

                    By making this API, I expected that developers who need realtime data on the COVID-19 situation
                    in Central Sulawesi can be helped by this API. </p>

            </div>
        </div>
    </section>

    <section class="py-8 bg-white border-b">
        <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Data
            </h2>
            <div class="w-full mb-4">
                <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/3">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://banuacoders.com/api/pico/kabupaten" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            DATA
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Kabupaten</i>
                        </div>
                        <p class="px-6 mb-5 text-base text-gray-600">
                            Returns data of COVID-19 cases in all districts / cities in Central Sulawesi.
                        </p>
                    </a>
                </div>
                <div class="flex-none p-6 mt-auto overflow-hidden bg-white">
                    <div class="flex items-center justify-start">
                        <a href="https://banuacoders.com/api/pico/kabupaten" class="px-8 py-4 mx-auto my-6 font-extrabold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline">
                            Click Here
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/3">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://banuacoders.com/api/pico/provinsi" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            DATA
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Provinsi</i>
                        </div>
                        <p class="px-6 mb-5 text-base text-gray-600">
                            Returns data of COVID-19 cases in all provinces throughout Indonesia.
                        </p>
                    </a>
                </div>
                <div class="flex-none p-6 mt-auto overflow-hidden bg-white">
                    <div class="flex items-center justify-start">
                        <a href="https://banuacoders.com/api/pico/provinsi" class="px-8 py-4 mx-auto my-6 font-extrabold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline">
                            Click Here
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/3">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://banuacoders.com/api/pico/statistik" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            DATA
                        </p>

                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Statistik</i>
                        </div>
                        <p class="px-6 mb-5 text-base text-gray-600">
                            Returns daily data of COVID-19 outbreak in Central Sulawesi since March 22, 2020.
                        </p>
                    </a>
                </div>
                <div class="flex-none p-6 mt-auto overflow-hidden bg-white">
                    <div class="flex items-center justify-start">
                        <a href="https://banuacoders.com/api/pico/statistik" class="px-8 py-4 mx-auto my-6 font-extrabold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline">
                            Click Here
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://banuacoders.com/api/pico/rumahsakit" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            DATA
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Rumah Sakit</i>
                        </div>
                        <p class="px-6 mb-5 text-base text-gray-600">
                            Returns data of the COVID-19 referral hospital in Central Sulawesi.
                        </p>
                    </a>
                </div>
                <div class="flex-none p-6 mt-auto overflow-hidden bg-white">
                    <div class="flex items-center justify-start">
                        <a href="https://banuacoders.com/api/pico/rumahsakit" class="px-8 py-4 mx-auto my-6 font-extrabold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline">
                            Click Here
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://banuacoders.com/api/pico/posko" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            DATA
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Posko</i>
                        </div>
                        <p class="px-6 mb-5 text-base text-gray-600">
                            Returns data of the COVID-19 Task Force Command Post in Central Sulawesi.
                        </p>
                    </a>
                </div>
                <div class="flex-none p-6 mt-auto overflow-hidden bg-white">
                    <div class="flex items-center justify-start">
                        <a href="https://banuacoders.com/api/pico/posko" class="px-8 py-4 mx-auto my-6 font-extrabold text-gray-300 rounded shadow-lg gradient2 lg:mx-0 hover:underline">
                            Click Here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="py-8 bg-white border-b">
        <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Data Source
            </h2>
            <div class="w-full mb-4">
                <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://bnpb-inacovid19.hub.arcgis.com/" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            WEBSITE
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>INACOVID-19</i>
                        </div>
                        <div class="items-center px-6 mx-auto mb-5 text-base text-gray-600">
                            <img class="object-contain w-full" src="data:image/png;base64,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" />
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://kawalcorona.com/api/" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            WEBSITE
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Kawal Corona</i>
                        </div>
                        <div class="items-center px-6 mx-auto mb-5 text-base text-gray-600">
                            <img class="object-contain w-full" src="https://kawalcorona.com/uploads/logo-ehi.png" />
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://dinkes.sultengprov.go.id/" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            WEBSITE
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Dinkes Sulawesi Tengah</i>
                        </div>
                        <div class="items-center px-6 mx-auto mb-5 text-base text-gray-600">
                            <img class="object-contain w-full" src="https://dinkes.sultengprov.go.id/wp-content/uploads/2018/06/cropped-EDIT-LOGO-DINKES-e1548842070889.png" />
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex flex-col flex-grow flex-shrink w-full p-6 rounded-lg hover:shadow-2xl md:w-1/2">
                <div class="flex-1 overflow-hidden bg-white">
                    <a href="https://corona.detexi.id/" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full px-6 mt-6 text-xs text-gray-600 md:text-sm">
                            WEBSITE
                        </p>
                        <div class="w-full px-6 text-xl font-bold text-gray-800">
                            <i>Detexi</i>
                        </div>
                        <div class="items-center px-6 mx-auto mb-5 text-base text-gray-600">
                            <img class="object-contain w-full" src="https://i.ibb.co/4pPMfdJ/brand.png" />
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full pt-8 pb-2 text-sm text-center">
                <a class="text-gray-500 no-underline hover:no-underline hover:text-indigo-800" href="https://banuacoders.com/">&copy;
                    BanuaCoders 2020</a>
            </div>
            <div class="w-full text-sm text-center">
                <a class="text-gray-500 no-underline hover:no-underline" href="https://instagram.com/ryanaidilp_">
                    Made with ♡ by <span class="hover:text-indigo-800">Fajrian Aidil Pratama</span>
                </a>
            </div>
        </div>
    </section>

</body>

</html>
