<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>


                <div class="p-6 text-gray-900">
                <ul class="list-group mt-3">
                    <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
                    <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
                    {{-- <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li> --}}


                    <li class="list-group-item">
                        Referral link:
                        <input type="text" id="referralLink" class="form-control d-inline-block w-50" value="{{ Auth::user()->referral_link }}" readonly>
                        <button class="btn btn-primary btn-sm" onclick="copyReferralLink()">Copy</button>
                    </li>

                    <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
                    <li class="list-group-item">Referred Users: {{ Auth::user()->referrals->count() }}</li>
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
