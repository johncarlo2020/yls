<x-app-layout>
  <div class="dashboard main main-bg">
    <div class="branding-container">
        @include('components.branding')
    </div>
    <h1>BORN TO BE ICONIC</h1>
    <div class="content">
        @foreach ($stations  as $station)
        <a class="title-container" href="{{ route('station.show', ['station' => $station->id]) }}">
            <div class="tile {{ $station->id %2 == 0? '':'reverse' }}">
                <p class="station-number">{{$station->id}}</p>
                <div class="img-container">
                    <img src="{{ asset('images/station' . $station->id . '.png') }}" alt="">
                    <div class="marker">
                        <p>CHECK-IN SUCCEFUL</p>
                    </div>
                </div>
                <p class="station-name">{{$station->name}}</p>
            </div>
        </a>
        @endforeach
    </div>
  </div>
</x-app-layout>
