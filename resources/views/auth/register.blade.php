<x-guest-layout>
    <div class="">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1>BORN TO BE ICONIC</h1>

            <!-- Name -->

            <!-- Email Address -->

            <div class="">
                <x-text-input
                    id="number"
                    class="d-none w-full mt-1"
                    type="number"
                    name="number"
                    :value="old('number')"
                    required
                    placeholder=""
                />
                <x-input-error
                    :messages="$errors->get('number')"
                    class="mt-2"
                />
            </div>
            <div class="flex items-center justify-end mt-4 d-none">
                <x-primary-button class="button" id="submitButton">
                    {{ __("SUBMIT") }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {});
</script>
