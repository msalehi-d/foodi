@extends('layouts.main')
@section('title','سفارش ها')
@section('contents')
<div class="row mb-2">
   <div class="col-md-12 border p-2">
      <h3 class="p-2">
         سفارش ها
      </h3>
      <table class="table  table-striped table-hover">
         <thead>
            <tr>
               <th>ردیف</th>
               <th>آیتم ها </th>
               <th>تاریخ درخواست </th>
               <th>وضعیت </th>
               <th>قیمت</th>
               <th>عملیات</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($orders as $order)
            <tr>
               <td>{{$loop->iteration}}
               </td>
               <td>
                  @foreach ($order->items as $item)
                  {{$item->food->name}} X {{$item->quantity}}
                  <br>
                  @endforeach
               </td>
               <td>
                  {{$order->created_at}}
               </td>
               <td>
                  {{$order->statusText}}
               </td>
               <td>
                  {{number_format($order->total_price)}}
               </td>
               <td>

                  @if ($order->status != config('constants.orderStatus.completed'))
                  <form action="{{route('admin.order.accept',$order)}}" method="POST">
                     @csrf
                     @method('PATCH')
                     <button type="submit" class="btn btn-success">تایید</button>
                  </form>
                  @endif
                  @if ($order->status != config('constants.orderStatus.cancelled'))
                  <form action="{{route('admin.order.reject',$order)}}" method="POST">
                     @csrf
                     @method('PATCH')
                     <button type="submit" class="btn btn-warning">لغو</button>
                  </form>
                  @endif
               </td>

            </tr>
            @endforeach
         </tbody>
      </table>
   </div>

</div>

@endsection