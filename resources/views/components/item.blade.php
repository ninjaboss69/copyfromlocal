@props(['item'])
<!-- <h1 class="mb-6 ml-6">{{$item->url}}</h1> -->
<div class="relative">
<div class="border-2 border-white rounded-lg py-2 px-3 mb-3 flex flex-row items-center h-16 overflow-hidden ">
 

 @if($item->type)
 @if($item->type=='jpg' || $item->type=='jpeg' || $item->type=='png')
 <img src="{{asset('storage/'.$item->url)}}" class="basis-1/6 w-8 h-12 object-contain	rounded-sm  inline-block" />
 @else
 <img src="{{asset('/images/question-mark.png')}}" class="basis-1/6  w-8 h-12 rounded-sm inline-block" />
 @endif
 @else
 <img src="{{asset('/images/question-mark.png')}}" class="basis-1/6  w-8 h-12 rounded-sm inline-block" />
 @endif
<form method="POST" action="{{route('download',$item->id)}}"  enctype="multipart/form-data" >
 @csrf
<button type="submit">
  <img src="{{asset('/images/download.png')}}" class="w-12 h-12 rounded-sm px-1 inline-block basis-1/6" />

  <!-- <lottie-player class="w-12 h-12 rounded-sm px-1 inline-block basis-1/6" src="https://assets4.lottiefiles.com/packages/lf20_fs5cobpp.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop controls autoplay></lottie-player> -->

</button>
</form>
<div class="basis-3/6 overflow-y-auto">
 {{$item->name?$item->name:$item->url}}
</div>
<div class="basis-1/6">
<img src="{{asset('/images/male.png')}}" class="w-12 h-12 rounded-sm px-3 inline-block" />
</div>
<div class="basis-1/6">
 
@if($item->owner_name)
<p>{{$item->owner_name}}</p>
@else
<p>Unknown User</p>
@endif
</div>
<div class="absolute  -top-2 -left-2 ">
  <img src="{{asset('/images/cross.png')}}" class="rounded-full w-6 h-6 buttons" id="{{$item->id}}"/>
</div>
</div>
</div>