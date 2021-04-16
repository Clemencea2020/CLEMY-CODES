<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ url('/clients/edit/update/'.$client->id) }}" method="POST" id="form">
                      @csrf
                      <div class="mb-6">
                          <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                            Names
                          </label>
                          <input type="text" name="names" id="names" placeholder="Full name" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" value="{{old('names')!=""?old('names'):$client->names}}" />
                          @error('names')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email Address</label>
                          <input type="email" name="email" id="email" placeholder="you@company.com" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('email')!=""?old('email'):$client->email}}"/>
                          @error('email')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Phone Number</label>
                          <input type="text" name="phone" id="phone" placeholder="Phone number" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('phone')!=""?old('phone'):$client->phone}}"/>
                          @error('phone')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                            Address
                          </label>
                          <input type="text" name="address" id="address" placeholder="Address" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('address')!=""?old('address'):$client->address}}"/>
                          @error('address')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            Update
                          </button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
