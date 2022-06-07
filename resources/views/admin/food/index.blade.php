@extends('layouts.main')
@section('title','غذا ها')
@section('contents')

<div class="row mb-2">
   <div class="col-md-12 border p-2">
      <h3 class="p-2">
         غذا ها
      </h3>
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
         <form action="{{route('admin.food.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            عنوان
            <input value="{{old('name')}}" class="form-control mb-2" type="text" name="name" id="" placeholder="عنوان">
            دسته بندی
            <select class="form-control mb-2" name="category" id="">
               @foreach ($categories as $categoryItem)
               <option value="{{$categoryItem->id}}">{{$categoryItem->title}}</option>
               @endforeach
            </select>
            موجودی
            <input value="{{old('stock')}}" class="form-control mb-2 text-start" type="number" name="stock" id="" placeholder="موجودی">
            قیمت
            <input value="{{old('regular_price')}}" class="form-control mb-2 text-start" type="number" name="regular_price" id="" placeholder="قیمت">
            زمان آماده سازی
            <input value="{{old('preparation_time')}}" class="form-control mb-2 text-start" type="number" name="preparation_time" id="" placeholder="زمان آماده سازی به دقیقه">
            توضیحات
            <textarea value="{{old('description')}}" name="description" id="" cols="2" rows="2" class="form-control mb-2 text-start" placeholder="توضیحات"></textarea>
            <input class="form-control mb-2" type="file" name="image" id="">

            <button type="submit" class="btn btn-primary">ثبت</button>
         </form>
      </div>


      <table class="table  table-striped table-hover">
         <thead>
            <tr>
               <th>تصویر</th>
               <th>نام </th>
               <th>قیمت </th>
               <th>موجودی </th>
               <th>دسته</th>
               <th>زمان آماده سازی</th>
               <th>عملیات</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($foods as $food)
            <tr>
               <td>
                  <img width="60" src="{{$food->image_url}}" alt="">
               </td>
               <td>
                  {{$food->name}}
               </td>
               <td>
                  {{$food->activePrice}}
               </td>
               <td>
                  {{$food->stock}}
               </td>
               <td>
                  {{$food->category->title}}
               </td>
               <td>
                  {{$food->preparation_time}}
               </td>
               <td>
                  <a href="{{route('admin.food.edit',$food)}}" class="btn btn-primary">ویرایش</a>

                  <form action="{{route('admin.food.destroy',$food)}}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-warning">حذف</button>
                  </form>

               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>

</div>

@endsection