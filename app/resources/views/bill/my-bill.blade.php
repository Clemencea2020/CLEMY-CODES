<x-guest-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                @include('header')
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h1>Water e-Payment</h1>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-1/2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Meter Code ID
                        </label>
                        <h2>{{$bill->meter_id}}</h2>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Client Names
                        </label>
                        <h2>{{$bill->client->names}}</h2>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Previous Reading
                        </label>
                        <h2>{{$bill->previousreading}}</h2>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Present Reading
                        </label>
                        <h2>{{$bill->presentreading}}</h2>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Price/Unit
                        </label>
                        <h2>{{$bill->priceunit}}</h2>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                          Bill Amount
                        </label>
                        <h2>{{$bill->amount}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
