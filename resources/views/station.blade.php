<x-app-layout>
    <div class="modal fade safari-padding" id="scanCompleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content">
                        <div class="image-check">
                            <i class="fa-regular check" style="font-size: 25px;
    margin-bottom: 25px;"></i>
                        </div>
                        <div class="text-content">
                            <p class="station-name-modal">

                            </p>
                            <p class="message">Check-in Successful</p>
                        </div>
                        <div class="">
                            <a href="{{ route('dashboard') }}" class="button">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="stationPage" class="station-page main main-bg">
        <div class="mb-3 branding-container">
            @include('components.branding')
        </div>
        <div id="mainContent" class="text-center text-content">
            <div class="content">
                <h1 class="station-born">BORN TO BE ICONIC</h1>
                @if($station->id == 1)
                <h2 class="station-name">LIBRE FRAGRANCE <br>& MAKE-UP DISCOVERY</h2>

                @else
                <h2 class="station-name">{{ $station->name }}</h2>

                @endif
                <p class="tag-line">{{ $station->description }}</p>
            </div>
            <div class="station-img">
                @if ($station->id == 2)
                <video src="{{ asset('images/vid.mp4') }}" autoplay muted loop playsinline alt="" />
                @else
                <img src="{{ asset('images/S' . $station->id . '.jpg') }}" alt="" />
                @endif
            </div>
            @if ($user == false)
            <div class="scanner-button">
                <button id="scan-btn" class="scan-btn">
                    <img src="{{ asset('images/camera.png') }}" />
                </button>
                <p>Scan the QR Code at the station to proceed</p>
            </div>
            @else
            <div class="scanner-button">
                <p class="mb-2">Checked In</p>
                <a class="button" href="{{ route('dashboard') }}"> Back</a>
            </div>
            @endif
        </div>
        <div id="scannerContainer" class="scanner-container d-none">
            <!-- <button id="close" class="mx-auto mt-4 camera-btn">x</button> -->
            <div id="reader"></div>
            <div class="p-3 mt-3">
                <p class="px-4 text-center bottom-text">
                    Find the QR code & Scan to check in the station
                </p>
            </div>

            <div class="button" id="btn-back">Back</div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        const mainContent = document.getElementById('mainContent');
        const scannerContainer = document.getElementById('scannerContainer');
        document.getElementById('btn-back').addEventListener('click', function (event) {
            event.preventDefault();
            mainContent.classList.remove('d-none');
            scannerContainer.classList.add('d-none');
        });

        document.getElementById('scan-btn').addEventListener('click', function (event) {
            event.preventDefault();

            mainContent.classList.add('d-none');
            scannerContainer.classList.remove('d-none');
            const isLandscape = window.innerWidth > window.innerHeight;
            //get permission to use camera dont start qr scanner until permission is granted

            const html5QrCode = new Html5Qrcode("reader");

            html5QrCode.start({
                facingMode: "environment",
            }, {
                fps: 10,
                qrbox: {
                    width: 200,
                    height: 250
                },
                aspectRatio: isLandscape ? 3 / 4 : 4 / 3

            },
                qrCodeMessage => {
                    console.log(`${qrCodeMessage}`);
                    sendMessage(`${qrCodeMessage}`);
                    html5QrCode.stop();

                },
                errorMessage => {
                    console.log(`QR Code no longer in front of camera.`);
                })
                .catch(err => {
                    console.log(`Unable to start scanning, error: ${err}`);
                });

        });

        function sendMessage(message) {
            // Fetch the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(message);

            $.ajax({
                url: '{{ route('process_qr_code') }}', // Using Laravel's route() helper function
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                },
                data: {
                    qrCodeMessage: message,
                    station: {{ $station-> id }}
                },
        success: function(response) {
            console.log('QR Code message sent successfully:', response);
            // Handle success response if needed

            const trimmedMessage = message.trim();
            // Get the last character of the QR code message
            const lastCharacter = trimmedMessage.charAt(trimmedMessage.length - 1);
            $('.check').addClass('fa-circle-check text-success');
            if (lastCharacter == 5) {
                var name = 'GIFT HAS BEEN SUCCESSFULLY REDEEMED';
                $('.station-name-modal').html(name);
                $('.message').addClass('d-none');
            } else {
                var name = $('.station-name').html();
                $('.station-name-modal').html(name);
            }


            mainContent.classList.remove('d-none');
            scannerContainer.classList.add('d-none');

            $('#scanCompleteModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error sending QR Code message:', error);
            $('.station-text').html('Failed');
            $('.message').html('Invalid QR code. Please try again.');
            $('.check').addClass('fa-circle-xmark text-danger');

            mainContent.classList.remove('d-none');
            scannerContainer.classList.add('d-none');
            $('#scanCompleteModal').modal('show');


        }
            });
        }

        function isSafari() {
            const userAgent = window.navigator.userAgent;
            const isChrome = userAgent.indexOf('Chrome') > -1;
            const isChromium = userAgent.indexOf('Chromium') > -1;
            const isSafari = userAgent.indexOf('Safari') > -1;

            return isSafari && !isChrome && !isChromium;
        }

        if (isSafari()) {
            const scannerContainer = document.getElementById('stationPage');
            scannerContainer.classList.add('safari-padding');
            console.log(isSafari());
        }
    </script>
</x-app-layout>