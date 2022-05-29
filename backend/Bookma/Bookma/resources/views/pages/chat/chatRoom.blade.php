@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->

@include('conponents.myPage.purchaserMenuButton')
  <div class="row  mt-5">
    <div class="col-sm-3 col-xs-12">
     @include('conponents.myPage.purchaserMenu')
    </div>
    <div class="col-sm-9 col-xs-12">
    @include('chat.room')
    </div>
  </div> 

</div>

@endsection