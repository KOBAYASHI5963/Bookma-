@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->


  <div class="row  mt-5">
    <div>
    @include('conponents.DetailUser.userExplanation')
    </div>
  </div> 

</div>

@endsection