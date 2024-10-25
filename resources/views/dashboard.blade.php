<x-app-layout>
    {{-- <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-orange-100 sm:rounded-lg">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </div>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-200 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 font-bold text-2xl">
                    {{ __("Your Profile and Referral Information!") }}
                </div> --}}

                <div class="p-6 text-gray-900 font-bold text-2xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Your Profile and Referral Information!') }}
                    </h2>

                    {{-- <p class="mt-1 text-sm text-gray-600">
                        {{ __("Shere your referral link and earn bonus points") }}
                    </p> --}}
                </header>
                </div>


                <div class="p-6 text-gray-900 text-1xl sm:p-8 bg-orange-100 shadow sm:rounded-lg">
                <ul class="list-group mt-3">
                    {{-- <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
                    <li class="list-group-item">Email: {{ Auth::user()->email }}</li> --}}
                    {{-- <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li> --}}

                    <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
                    <li class="list-group-item">Your Referred Users: {{ Auth::user()->referrals->count() }}</li>

                    <p class="mt-1 text-md text-gray-600">
                        {{ __("Shere your referral link and earn bonus") }}

                    </p>

                    <li class="list-group-item mt-3">
                        <a href="{{route('referrals.create')}}"
                        class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:from-pink-500 hover:to-purple-500 transition duration-300 ease-in-out transform hover:scale-105">
                        Refer Your Friends
                        </a>
                    </li>


                    {{-- <li class="list-group-item">
                        Referral link:
                        <input type="text" id="referralLink" class="form-control d-inline-block w-50" value="{{ Auth::user()->referral_link }}" readonly>
                        <button class="btn btn-primary btn-sm" onclick="copyReferralLink()">Copy</button>
                    </li> --}}

  <!-- Referral link -->
  {{-- <a href="mailto:{{ Auth::user()->referral_link }}"
  class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:from-pink-500 hover:to-purple-500 transition duration-300 ease-in-out transform hover:scale-105">
  Refer Your Friends
</a> --}}


                </ul>
            </div>


            </div>
        </div>
    </div>
</x-app-layout>



<script>
    function copyReferralLink() {
        // Select the referral link text
        var referralLink = document.getElementById("referralLink");
        referralLink.select();
        referralLink.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        document.execCommand("copy");

        // Alert the copied text (optional)
        alert("Copied the referral link: " + referralLink.value);
    }
</script>
