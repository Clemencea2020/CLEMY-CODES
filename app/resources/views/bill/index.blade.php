<x-app-layout>
    <x-slot name="header">
      @include('header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full ">
                      <thead>
                        <tr>
                          <th class="text-left">ID</th>
                          <th class="text-left">Client Name</th>
                          <th class="text-left">Meter Code Id</th>
                          <th class="text-left">Previous reading</th>
                          <th class="text-left">Present reading</th>
                          <th class="text-left">Price/unit</th>
                          <th class="text-left">Amount</th>
                          <th class="text-left">Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($bills->count() > 0)
                            @foreach($bills as $key => $bill)
                                <tr>
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->client->names}}</td>
                                    <td>{{$bill->meter_id}}</td>
                                    <td>{{$bill->previousreading}}</td>
                                    <td>{{$bill->presentreading}}</td>
                                    <td>{{$bill->priceunit}}</td>
                                    <td>{{$bill->amount}}</td>
                                    <td>
                                      <a href="{{ url('/bills/'.$bill->id.'/edit')}}">Edit</a> |
                                      <a href="{{ url('/bills/'.$bill->id.'/delete')}}">Delete</a> |
                                      <a href="{{ url('/bills/'.$bill->id.'/my-bill')}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="4">No data</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
