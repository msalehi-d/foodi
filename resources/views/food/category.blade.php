@extends('layouts.main')
@section('title',$category->title)
@section('contents')
<div class="row mb-2">

@foreach ($foods as $food)
<div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <a href="{{route('food.show',$food)}}" class="mb-0 h3 text-decoration-none">
                {{$food->name}}
            </a>
            <div class="mb-1 text-muted">
            {{$food->category->title}}
            </div>
            <p class="mb-auto">
              {{Str::words($food->description,6)}} 
            </p>
            <div class="fw-bold text-primary">
               {{number_format($food->active_price)}}
            </div>
         </div>
         
         <div class="col-auto d-none d-lg-block">
           <img src="{{$food->imageUrl}}" alt="">
         </div>
      </div>
   </div>
@endforeach
</div>



@endsection