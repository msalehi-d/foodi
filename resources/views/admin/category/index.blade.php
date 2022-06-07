@extends('layouts.main')
@section('title','دسته بندی ها')
@section('contents')

<div class="row my-4">
   <h4>
      افزودن دسته
   </h4>
   @if($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
      </ul>
   </div>
   @endif
   <form action="{{route('admin.category.store')}}" method="POST">
      @csrf
      <input class="form-control" type="text" name="title" id="" placeholder="Title">
      <input class="form-control" type="text" name="slug" id="" placeholder="Slug">
      <button type="submit" class="btn btn-primary">ثبت</button>
   </form>
</div>
<div class="row mb-2">
   <div class="col-md-12 border p-2">
      <h3 class="p-2">
         دسته بندی ها
      </h3>
      <table class="table  table-striped table-hover">
         <thead>
            <tr>
               <th>ردیف</th>
               <th>عنوان</th>
               <th>اسلاگ</th>
               <th>عملیات</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $category)
            <tr>
               <td>{{$loop->iteration}}
               </td>
               <td>
                  {{$category->title}}
               </td>
               <td>
                  {{$category->slug}}
               </td>
               <td>
                  <form action="{{route('admin.category.destroy',$category)}}" method="POST">
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