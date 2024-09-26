<x-guest-layout>
    <div class="">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="">
                <x-text-input
                    id="code"
                    class="d-none w-full mt-1"
                    type="text"
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
            const urlParams = new URLSearchParams(window.location.search);

            // Extract the 'id' parameter from the URL
            const id = urlParams.get("id");

            // Log the 'id' value or use it as needed
            console.log(id);
            $("#code").val(id);
            $("form").submit();
        });
    </script>
</x-guest-layout>
