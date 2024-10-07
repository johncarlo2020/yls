<x-app-layout>
    <div class="dashboard main main-bg safari-padding">
        <div class="branding-container">@include('components.branding')</div>
        <h1>BORN TO BE ICONIC</h1>
        <div class="content">
            @foreach ($stations as $station)
            @if($station->id != 5)
            <a class="title-container" href="{{ route('station.show', ['station' => $station->id]) }}">
                <div class="tile {{ $station->id %2 == 0? '':'reverse' }}">
                    <p class="station-number">{{$station->id}}</p>
                    <div class="img-container {{$station->status == true ? 'active':''}}">
                        <img src="{{ asset('images/S' . $station->id . '.jpg') }}" alt="" />
                        <div class="marker">
                            <p>CHECK-IN SUCCEFUL</p>
                        </div>
                    </div>
                    <div class="text-container-dashboard">
                        <p class="station-name-dashboard">{{$station->name}}</p>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</x-app-layout>