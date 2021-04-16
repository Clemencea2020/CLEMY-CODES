<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h1>Edit Bill</h1>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ url('/bills/'.$bill->id.'/edit/update') }}" method="POST" id="form">
                      @csrf
                      <input type="hidden" name="meter_id" value="{{$bill->meter_id}}">
                      <input type="hidden" name="client_id" value="{{$bill->client->id}}">
                      <input type="hidden" name="previousreading" value="{{$bill->previousreading}}">
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
                          <label for="pipeline" class="text-sm text-gray-600 dark:text-gray-400">
                            Present reading
                          </label>
                          <input type="text" name="presentreading" id="presentreading" placeholder="Enter pipe line" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('presentreading')!=""?old('presentreading'):$bill->presentreading}}"/>
                          @error('presentreading')
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
