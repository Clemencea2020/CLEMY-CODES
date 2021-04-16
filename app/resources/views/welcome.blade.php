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
                  <form action="{{ url('/bills/check') }}" method="POST" id="form">
                      @csrf
                      <div class="mb-6">
                          <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                            Enter your Meter Code Id
                          </label>
                          <input type="text" name="metercodeid" id="metercodeid" placeholder="Enter meter code id" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                          @error('metercodeid')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            View
                          </button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
