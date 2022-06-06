@extends('layouts.main')
@section('title',$category->title)
@section('contents')
<div class="row mb-2">

   @foreach ($foods as $food)
   @include('components.food-box',$food)
   @endforeach
</div>



@endsection