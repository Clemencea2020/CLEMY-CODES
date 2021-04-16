<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ url('/clients/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Client
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full ">
                      <thead>
                        <tr>
                          <th class="text-left">ID</th>
                          <th class="w-1/2 ... text-left">Names</th>
                          <th class="w-1/5 ... text-left">Address</th>
                          <th class="w-1/5 ... text-left">Phone Number</th>
                          <th class="w-1/3 ... text-left">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($clients->count() > 0)
                            @foreach($clients as $key => $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->names}}</td>
                                    <td>{{$client->address}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>
                                        <a href="{{ url('/clients/'.$client->id.'/edit')}}">Edit</a> |
                                        <a href="{{ url('/clients/delete/'.$client->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="3">No clients</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
