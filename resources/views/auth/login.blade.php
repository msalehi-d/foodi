@extends('layouts.main')
@section('title','Login')
@section('contents')
<div class="row mb-2 justify-content-center">
   <form class="col-lg-4" method="POST">
      @csrf
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
      </div>
      <div class="form-check mb-3">
         <input name="remember" class="form-check-input" type="checkbox" value="" id="remember">
         <label class="form-check-label" for="remember">
            مرا به یاد بسپار
         </label>
      </div>
      <div class="mb-3">
         <button type="submit" class="btn btn-primary">ورود</button>
      </div>
   </form>


</div>

@endsection