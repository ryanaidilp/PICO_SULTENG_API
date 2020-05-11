<div class="w-full p-3">
    <!--Table Card-->
    <div class="bg-white border-transparent rounded-lg shadow-lg">
        <div class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase md:text-3xl text-gray-600">Peta penyebaran COVID-19 di Sulawesi Tengah
            </h5>
        </div>
        <div class="mx-auto max-w-md text-center flex flex-wrap justify-center">
            <p class="m-6 mb-0">Pilih <b> data</b> dan <b>jenis peta</b> yang ingin ditampilkan : </p>
            <div class="flex items-center mr-4">
                <input id="district-positif" type="radio" name="data_covid" value="Positif" class="hidden" checked />
                <label for="district-positif" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    Positif</label>
            </div>

            <div class="flex items-center mr-4">
                <input id="district-sembuh" type="radio" name="data_covid" value="Sembuh" class="hidden" />
                <label for="district-sembuh" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    Sembuh</label>
            </div>

            <div class="flex items-center mr-4">
                <input id="district-meninggal" type="radio" name="data_covid" value="Meninggal" class="hidden" />
                <label for="district-meninggal" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    Meninggal</label>
            </div>

            <div class="flex items-center mr-4">
                <input id="district-odp" type="radio" name="data_covid" value="ODP" class="hidden" />
                <label for="district-odp" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    ODP</label>
            </div>

            <div class="flex items-center mr-4">
                <input id="district-pdp" type="radio" name="data_covid" value="PDP" class="hidden" />
                <label for="district-pdp" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    PDP</label>
            </div>

        </div>
        <div class="mx-auto max-w-md text-center flex flex-wrap justify-center">
            <div class="flex items-center mr-4">
                <button id="btn-choropleth"
                    class="w-40 md:w-100 text-sm bg-blue-400 rounded p-2 mt-6 ml-6 mb-0 text-white hover:bg-blue-600 hover:shadow-md"
                    onclick="checkMapDistrict(this.id)">Choropleth</button>
            </div>
            <div class="flex items-center mr-4">
                <button id="btn-bubble"
                    class="w-40 md:w-100 text-sm bg-blue-400 rounded p-2 mt-6 ml-6 mb-0 text-white hover:bg-blue-600 hover:shadow-md"
                    onclick="checkMapDistrict(this.id)">Bubble</button>
            </div>
        </div>
        <div id='map_kabupaten_case' class="rounded-b mt-2 w-full" style='height: 500px;'></div>
    </div>
    <!--/table Card-->
</div>
