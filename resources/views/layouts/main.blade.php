<!DOCTYPE html>
<html dir="rtl" data-lt-installed="true" lang="fa">

<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <title>@yield('title') | Foodi</title>

   <!-- Bootstrap core CSS -->
   <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet">
   <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>

   <div class="container">
      <header class="blog-header py-3">
         <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
               <input class="form-control" type="text" name="search" placeholder="جستجو" id="">
            </div>
            <div class="col-4 text-center">
               <a class="blog-header-logo text-dark text-decoration-none" href="/">Foodi</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">

               @auth
               @if (auth()->user()->role = config('constants.roles.admin'))
               <a class="btn btn-sm btn-outline-secondary me-1" href="{{route('admin.order.index')}}">داشبورد</a>
               <a class="btn btn-sm btn-outline-secondary me-1" href="{{route('admin.category.index')}}">دسته بندی ها</a>
               <a class="btn btn-sm btn-outline-secondary me-1" href="{{route('admin.food.index')}}">غذاها</a>
               @endif
               <a class="btn btn-sm btn-outline-secondary me-1" href="{{route('customer.order.show')}}">سبد خرید</a>
               <a class="btn btn-sm btn-outline-secondary" href="{{route('customer.account')}}">حساب کاربری</a>
               @else
               <a class="btn btn-sm btn-outline-secondary" href="{{route('login')}}">ورود</a>
               @endauth
            </div>
         </div>
      </header>
      <div class="nav-scroller py-1 mb-2">
         <nav class="nav d-flex justify-content-between">
            @foreach ($categories as $menuCategory)
            <a class="@isset($category) @if($category->id == $menuCategory->id) bg-primary text-white rounded @endif @endisset p-2 text-decoration-none link-secondary" href="{{route('food.category',$menuCategory)}}">{{$menuCategory->title}}</a>
            @endforeach
         </nav>
      </div>
   </div>
  
   <main class="container">
      <div class="mt-3">
         @yield('contents')
      </div>

   </main>

   <footer class="blog-footer">
      <p>
         کپی‌رایت
      </p>
         <a href="#">Foodi.com</a>
      </p>
   </footer>
</body>

</html>