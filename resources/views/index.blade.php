@extends('app')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 mt-24 h-4/5">
        <x-status />
        <div class="container flex flex-col ">
             <form method="POST" action="/" enctype="multipart/form-data" class="p-12">
                        @csrf
                        
                        <div class="mb-6">
                        
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="file"
                                id="file"
                               
                            />
                        </div>
                    <button class="bg-gray-900 text-white rounded-lg px-12 py-6" type="submit">Submit</button>
                    </form>
        </div>
        <div class="px-12 py-12  overflow-y-auto"> 
            @if(count($items)>=1)
              @foreach($items as $item)
               <x-item :item='$item'></x-item>
              @endforeach
            
            @else
            <div>
                <span class="text-red-100 block">No File here yet !!!</span>
                
                <span class="text-red-100">Upload so that you can share with Friends</span></div>
            @endif
        </div>
        </div>
@endsection