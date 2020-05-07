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
        <link rel="icon" href="favicon.png" type="image/x-icon" />

        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!--Datatables -->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-core.min.js" type="text/javascript"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-exports.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-ui.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-map.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.anychart.com/releases/8.7.1/css/anychart-ui.min.css" />
        <link rel="stylesheet" type="text/css"
        href="https://cdn.anychart.com/releases/8.7.1/fonts/css/anychart-font.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.15/proj4.js" data-export="true"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/geodata/countries/indonesia/indonesia.js"></script>
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
            integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
        <style>
            @import url("https://rsms.me/inter/inter.css");

            html {
                font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
                    Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
                    "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                    "Noto Color Emoji";
            }

            @media (min-width: 1680px) {
                #id_whitebox {
                    display: none;
                    visibility: hidden;
                }
            }

            .gradient {
                background-image: linear-gradient(110deg, #9db0b9 0%, #1695df 100%);
            }

            button,
            .gradient2 {
                background-color: #2c91a3;
                background-image: linear-gradient(315deg, #86e3f3 0%, #286dbb 74%);
            }

            .img-bw {
                /* filter: url(filters.svg#grayscale); Firefox 3.5+ */
                filter: gray;
                /* IE5+ */
                -webkit-filter: grayscale(1);
                /* Webkit Nightlies & Chrome Canary */
                -webkit-transition: all .2s ease-in-out;
            }


            .transition-kit {
                -webkit-transition: all .2s ease-in-out;
            }

            .img-bw:hover {
                filter: none;
                -webkit-filter: grayscale(0);
                -webkit-transform: scale(1.01);
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

            .browser-mockup {
                position: relative;
            }

            .browser-mockup:before {
                display: block;
                position: absolute;
                content: "";
                border-radius: 50%;
            }

            .browser-mockup>* {
                display: block;
            }
        </style>
    </head>

    <body class="gradient leading-relaxed tracking-wide flex flex-col">
