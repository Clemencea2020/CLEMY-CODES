<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h1>Create Meter</h1>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ url('/meters/create/store') }}" method="POST" id="form">
                      @csrf
                      <div class="mb-6">
                          <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                            Client
                          </label>
                          <select class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" name="client_id">
                            <option value="">Select Client</option>
                            @foreach($clients as $key => $client)
                              <option value="{{$client->id}}" {{old('client_id')==$client->id? 'selected':''}}>{{$client->names}}</option>
                            @endforeach
                          </select>
                          @error('client_id')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Meter Land upi</label>
                          <input type="text" name="meterlandupi" id="meterlandupi" placeholder="Enter Land upi" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('meterlandupi')}}"/>
                          @error('meterlandupi')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <label for="pipeline" class="text-sm text-gray-600 dark:text-gray-400">Pipe Line</label>
                          <input type="text" name="pipeline" id="pipeline" placeholder="Enter pipe line" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"  value="{{old('pipeline')}}"/>
                          @error('pipeline')
                            <div class="text-red-600 ...">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-6">
                          <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            Save
                          </button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
