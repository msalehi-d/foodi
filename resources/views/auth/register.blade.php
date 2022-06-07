@extends('layouts.main')
@section('title','Login')
@section('contents')
<div class="row mb-2 justify-content-center">
   <form class="col-lg-4" method="POST" action="{{route('register.check')}}">
      @csrf
      <div class="mb-3">
         <label for="email" class="form-label">نام
            @error('name')
            <small class="text-danger">
               ({{$message}})
            </small>
            @enderror
         </label>
         <input name="name" type="text" class="form-control" id="name">
      </div>
      <div class="mb-3">
         <label for="email" class="form-label">ایمیل
            @error('email')
            <small class="text-danger">
               ({{$message}})
            </small>
            @enderror
         </label>
         <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
         <label for="password" class="form-label">پسورد
            @error('password')
            <small class="text-danger">
               ( {{$message}})
            </small>
            @enderror
         </label>
         <input name="password" type="password" class="form-control" id="password">
         <label for="password" class="form-label">تکرار پسورد

         </label>
         <input name="password_confirmation" type="password" class="form-control" id="password">
      </div>

      <div class="mb-3">
         <button type="submit" class="btn btn-primary">ثبت نام</button>
      </div>
   </form>


</div>

@endsection