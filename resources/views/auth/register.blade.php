<x-guest-layout>
    <div class="">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1>BORN TO BE ICONIC</h1>
            <div id="scannerContainer" class="scanner-container">
                <!-- <button id="close" class="mx-auto mt-4 camera-btn">x</button> -->
                <div id="reader"></div>
                <x-input-error
                    class="text-danger"
                    :messages="$errors->get('code')"
                    class="mt-2"
                />

                <div class="p-3 mt-3">
                    <p class="px-4 text-center bottom-text">
                        Scan the QR code from crew to Start your Journey
                    </p>
                </div>
            </div>

            <div class="">
                <x-text-input
                    id="code"
                    class="d-none w-full mt-1"
                    type="code"
                    name="code"
                    required
                    placeholder=""
                />
            </div>
            <div class="flex items-center justify-end mt-4 d-none">
                <x-primary-button class="button" id="submitButton">
                    {{ __("SUBMIT") }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const isLandscape = window.innerWidth > window.innerHeight;
            //get permission to use camera dont start qr scanner until permission is granted

            const html5QrCode = new Html5Qrcode("reader");

            html5QrCode
                .start(
                    {
                        facingMode: "environment",
                    },
                    {
                        fps: 10,
                        qrbox: {
                            width: 200,
                            height: 250,
                        },
                        aspectRatio: isLandscape ? 3 / 4 : 4 / 3,
                    },
                    (qrCodeMessage) => {
                        console.log(`${qrCodeMessage}`);
                        $("#code").val(`${qrCodeMessage}`);
                        $("form").submit();
                        html5QrCode.stop();
                    },
                    (errorMessage) => {
                        console.log(`QR Code no longer in front of camera.`);
                    }
                )
                .catch((err) => {
                    console.log(`Unable to start scanning, error: ${err}`);
                });
        });
    </script>
</x-guest-layout>
