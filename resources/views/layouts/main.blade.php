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
               <a class="link-secondary" href="#">الإشتراك في النشرة البريدية</a>
            </div>
            <div class="col-4 text-center">
               <a class="blog-header-logo text-dark" href="#">كبير</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
               <a class="link-secondary" href="#" aria-label="بحث">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                     <title>بحث</title>
                     <circle cx="10.5" cy="10.5" r="7.5"></circle>
                     <path d="M21 21l-5.2-5.2"></path>
                  </svg>
               </a>
               <a class="btn btn-sm btn-outline-secondary" href="#">إنشاء حساب</a>
            </div>
         </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
         <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="#">العالم</a>
            <a class="p-2 link-secondary" href="#">الولايات المتحدة</a>
            <a class="p-2 link-secondary" href="#">التقنية</a>
            <a class="p-2 link-secondary" href="#">التصميم</a>
            <a class="p-2 link-secondary" href="#">الحضارة</a>
            <a class="p-2 link-secondary" href="#">المال والأعمال</a>
            <a class="p-2 link-secondary" href="#">السياسة</a>
            <a class="p-2 link-secondary" href="#">الرأي العام</a>
            <a class="p-2 link-secondary" href="#">العلوم</a>
            <a class="p-2 link-secondary" href="#">الصحة</a>
            <a class="p-2 link-secondary" href="#">الموضة</a>
            <a class="p-2 link-secondary" href="#">السفر</a>
         </nav>
      </div>
   </div>

   <main class="container">
      <!--div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
         <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">عنوان تدوينة مميزة أطول</h1>
            <p class="lead my-3">عدة أسطر نصية متعددة تعبر عن التدوية، وذلك
               لإعلام القراء الجدد بسرعة وكفاءة حول أكثر الأشياء إثارة للاهتمام في
               محتويات هذه التدوينة.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">أكمل القراءة...</a></p>
         </div>
      </div-->
      <div class="mt-3">
         @yield('contents')
      </div>

   </main>

   <footer class="blog-footer">
      <p>تم تصميم نموذج المدونة لـ <a href="https://getbootstrap.com/">Bootstrap</a> بواسطة <a href="https://twitter.com/mdo"><bdi dir="ltr" lang="en">@mdo</bdi></a>.</p>
      <p>
         <a href="#">عد إلى الأعلى</a>
      </p>
   </footer>
</body>

</html>