<x-app-layout>
    <div id="stationPage" class="station-page main main-bg safari-padding">
        <div class="mb-3 branding-container">
            @include('components.branding')
        </div>
        <div id="mainContent" class="text-center text-content">
            <div class="content">
                <h2 class="station-born ">BORN TO BE ICONIC</h2>
                <p class="landing-tagline">Start your immersive fragrance experience and discover the iconic scents of
                    LIBRE
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