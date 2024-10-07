<x-app-layout>
    <div id="stationPage" class="station-page main main-bg safari-padding">
        <div class="mb-3 branding-container">
            @include('components.branding')
        </div>
        <div id="mainContent" class="text-center text-content">
            <div class="content">
                <h2 class="station-name">BORN TO BE ICONIC</h2>
                <p class="tag-line">Start your immersive fragrance experience and discover the iconic scents of Libre
                    Flowers & Flames and MYSLF Le Parfum.</p>
            </div>
            <div class="station-img">
                <img src="{{ asset('images/main.gif') }}" alt="" />
            </div>

            <div class="container w-50 mt-5">
                <a class="button" href="{{ route('dashboard') }}"> DISCOVER NOW</a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>