@extends('layouts.main')
@section('title','سفارش شما')
@section('contents')
<div class="row mb-2">
   @error('overAdd')
   <div class="text-danger">
      {!! session('errors')->first('overAdd') !!}
   </div>
   @enderror
   <div class="col-md-8 border p-2">
      <h3 class="p-2">
         سفارش شما
      </h3>
      @if($order->items->isNotEmpty())
      <form action="{{route('customer.order.update',$order)}}" method="POST">
         @csrf
         @method('PATCH')
         <table class="table cart">
            <thead>
               <tr>
                  <th>ردیف</th>
                  <th>نام </th>
                  <th>تعداد</th>
                  <th>قیمت</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($order->items as $item)
               <tr>
                  <td>{{$loop->iteration}}
                     <input type="hidden" name="items[]" value="{{$item->id}}">
                  </td>
                  <td>{{$item->food->name}}</td>
                  <td>
                     <input name="quantity[{{$item->id}}]" min="0" max="{{$item->food->stock}}" class="form-control quantity" type="number" value="{{$item->quantity}}">
                  </td>
                  <td>{{number_format($item->item_price)}}</td>

               </tr>
               @endforeach
            </tbody>
         </table>
         <button type="submit" class="btn btn-secondary">بروزرسانی سفارش</button>
      </form>
      @endif
   </div>
   <div class="col-md-4 border p-2">
      مجموع:
      {{number_format($order->total)}}
      <form method="POST" action="{{route('customer.order.submit',$order)}}">
         @csrf
         <button type="submit" class="btn btn-primary">ثبت سفارش</button>
      </form>
   </div>

</div>

@endsection