{{-- resources/views/components/cookie-consent.blade.php --}}
<div x-data="{ 
    showBanner: !localStorage.getItem('cookieConsent'),
    acceptCookies() {
        localStorage.setItem('cookieConsent', 'accepted');
        this.showBanner = false;
        // Initialize analytics here if needed
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
        }
    },
    rejectCookies() {
        localStorage.setItem('cookieConsent', 'rejected');
        this.showBanner = false;
    }
}" 
x-show="showBanner" 
x-cloak
class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50"
x-transition:enter="transform transition ease-out duration-300"
x-transition:enter-start="translate-y-full"
x-transition:enter-end="translate-y-0"
x-transition:leave="transform transition ease-in duration-300"
x-transition:leave-start="translate-y-0"
x-transition:leave-end="translate-y-full">
    <div class="container mx-auto px-6 py-4">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
            <div class="flex-1 text-sm text-gray-600">
                <p>
                    We use cookies to enhance your browsing experience and analyze our traffic. 
                    By clicking "Accept", you consent to our use of cookies. 
                    <a href="{{ route('privacy') }}" class="text-indigo-600 hover:text-indigo-700 underline">
                        Learn more
                    </a>
                </p>
            </div>
            <div class="flex space-x-3">
                <button @click="rejectCookies()" 
                        class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-full hover:bg-gray-50 transition">
                    Decline
                </button>
                <button @click="acceptCookies()" 
                        class="px-6 py-2 text-sm bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
                    Accept All
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Add this to your layout file before closing </body> tag --}}
{{-- <x-cookie-consent /> --}}