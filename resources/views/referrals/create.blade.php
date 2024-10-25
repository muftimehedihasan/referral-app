<x-app-layout>
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-16 space-y-6 bg-slate-500 p-6 rounded">

<h2>You can shere via copy link</h2>
            <!-- Copy Referral Link Section -->
            <div lass="flex items-center space-x-3">
                <div class="relative w-96 ">
                    <!-- Styled referral link similar to input -->
                    <input type="text" id="referralLink" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ Auth::user()->referral_link }}" readonly>

                    <!-- Button to Copy the Link -->
                    <button type="button" class="btn btn-primary bg-indigo-500 py-2 px-4 rounded absolute right-0 top-0 bottom-0 m-2" onclick="copyReferralLink()">
                        Copy Link
                    </button>
                </div>
            </div>

            <!-- Send Invite Form -->
            <div>
                <h2>You can shere via email</h2>
                <form action="{{ route('referrals.store') }}" method="POST" class="flex items-center space-x-3">
                    @csrf
                    <div class="relative w-96">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@domain.com" required>
                    </div>

                    <button type="submit" class="btn btn-primary bg-indigo-500 py-2 px-4 rounded">
                        Send Invite
                    </button>
                </form>




            </div>
        </div>
    </div>

    <script>
        function copyReferralLink() {
            /* Copy the referral link to clipboard */
            var copyText = document.getElementById("referralLink");
            copyText.select();
            document.execCommand("copy");
            alert("Referral link copied to clipboard: " + copyText.value);
        }
    </script>
</x-app-layout>
