@extends('layouts.main')
@section('title','در حال انجام')
@section('contents')
<div class="row mb-2">

   <div class="col-md-12 border p-2">
      <p class="p-2 h3 text-center">
         {{$order->statusText}}
         <br>
         @if ($order->status == config('constants.orderStatus.processing'))
         سفارش شما ثبت شد و در حال انتظار تایید می باشد.
         @endif
      </p>
      <p class="p-2  text-center">
         زمان تقریبی تحویل:
         {{$order->delivery_time}}

      </p>
   </div>

</div>

@endsection