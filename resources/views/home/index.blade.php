@extends('layouts.main')
@section('title','Home')
@section('contents')
<div class="row mb-2">

@foreach ($foods as $food)
<div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">
               {{$food->name}}
            </strong>
            <h3 class="mb-0">عنوان الوظيفة</h3>
            <div class="mb-1 text-muted">نوفمبر 11</div>
            <p class="mb-auto">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي.</p>
            <a href="#" class="stretched-link">أكمل القراءة</a>
         </div>
         <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false">
               <title>Placeholder</title>
               <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text>
            </svg>

         </div>
      </div>
   </div>
@endforeach


</div>



@endsection