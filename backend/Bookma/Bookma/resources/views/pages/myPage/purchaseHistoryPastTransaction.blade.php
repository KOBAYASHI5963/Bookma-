@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->

@include('conponents.myPage.purchaserMenuButton')
  <div class="row  mt-5">
    <div class="col-sm-6 col-xs-12">
     @include('conponents.myPage.purchaserMenu')
    </div>
    <div class="col-sm-6 col-xs-12">
    @include('conponents.myPage.pastPurchasedItem')
    </div>
  </div> 

</div>

@endsection

