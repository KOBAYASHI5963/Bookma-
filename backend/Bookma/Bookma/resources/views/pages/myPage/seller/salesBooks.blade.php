@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->

@include('conponents.myPage.seller.purchaserMenuButton')
  <div class="row  mt-5">
    <div class="col-sm-3 col-xs-12">
     @include('conponents.myPage.seller.purchaserMenu')
    </div>
    <div class="col-sm-9 col-xs-12">
    @if(isset($salesBooks))
     @include('conponents.myPage.seller.salesBooksUpdate',
     [
      'user' => $user, 
      'sellerSalesBooks' => $sellerSalesBooks
     ])
    @else
     @include('conponents.myPage.seller.salesBooksCreate')
    @endif
    </div>
  </div> 

</div>

@endsection