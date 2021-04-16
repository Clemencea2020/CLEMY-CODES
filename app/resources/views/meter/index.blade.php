<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ url('/meters/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Client Meter
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full ">
                      <thead>
                        <tr>
                          <th class="w-1/6 ... text-left">Meter Code ID</th>
                          <th class="w-1/4 ... text-left">Client Name</th>
                          <th class="w-1/5 ... text-left">Meter Land UPI</th>
                          <th class="w-1/5 ... text-left">Pipe Line</th>
                          <th class="w-1/3 ... text-left">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($meters->count() > 0)
                            @foreach($meters as $key => $meter)
                                <tr>
                                    <td>{{$meter->metercodeid}}</td>
                                    <td>{{$meter->client->names}}</td>
                                    <td>{{$meter->meterlandupi}}</td>
                                    <td>{{$meter->pipeline}}</td>
                                    <td>
                                        <a href="{{ url('/meters/'.$meter->metercodeid .'/edit')}}">Edit</a> |
                                        <a href="{{ url('/meters/delete/'.$meter->metercodeid)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="4">No meters</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
