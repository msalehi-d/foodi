@extends('layouts.main')
@section('title',$food->name)
@section('contents')
<div class="row mb-2">

   <div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">
               {{$food->name}}
            </h3>
            <div class="mb-1 text-muted">
               {{$food->category->title}}
            </div>
            <p class="mb-auto">
               {{$food->description}}
            </p>
            <div class="fw-bold text-primary">
               {{number_format($food->active_price)}}
            </div>
            <div>
            موجودی: 
               {{$food->stock}}

            </div>
            <div>
               <form method="POST" action="{{route('order.add',$food)}}">
                  @csrf
                  <button type="submit" class="btn btn-primary">افزودن به سبد</button>
               </form>
            </div>
         </div>

         <div class="col-auto d-none d-lg-block">
            <img src="{{$food->imageUrl}}" alt="{{$food->title}}">
         </div>
      </div>
   </div>
</div>



@endsection