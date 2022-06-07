@extends('layouts.main')
@section('title','ویرایش')
@section('contents')

@if($errors->any())
<div class="alert alert-danger">
   <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
   </ul>
</div>
@endif
<div class="my-3">
   <form action="{{route('admin.food.update',$food)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      عنوان
      <input value="{{old('name',$food->name)}}" class="form-control mb-2" type="text" name="name" id="" placeholder="عنوان">
      دسته بندی
      <select class="form-control mb-2" name="category" id="">
         @foreach ($categories as $categoryItem)
         <option value="{{$categoryItem->id}}" @if($food->category_id == $categoryItem->id) selected @endif>{{$categoryItem->title}}</option>
         @endforeach
      </select>
      موجودی
      <input value="{{old('stock',$food->stock)}}" class="form-control mb-2 text-start" type="number" name="stock" id="" placeholder="موجودی">
      قیمت
      <input value="{{old('regular_price',$food->regular_price)}}" class="form-control mb-2 text-start" type="number" name="regular_price" id="" placeholder="قیمت">
      زمان آماده سازی
      <input value="{{old('preparation_time',$food->preparation_time)}}" class="form-control mb-2 text-start" type="number" name="preparation_time" id="" placeholder="زمان آماده سازی به دقیقه">
      توضیحات
      <textarea value="{{old('description',$food->description)}}" name="description" id="" cols="2" rows="2" class="form-control mb-2 text-start" placeholder="توضیحات"></textarea>
      <input class="form-control mb-2" type="file" name="image" id="">

      <button type="submit" class="btn btn-primary">ثبت</button>
   </form>
</div>

@endsection