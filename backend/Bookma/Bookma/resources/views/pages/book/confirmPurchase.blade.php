@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->


  <div class="row  mt-5">
    <div class="col-sm-8 col-xs-12">
     @include('conponents.Transaction.transactionInformation')
    </div>
    <div class="col-sm-4 col-xs-12">
    @include('conponents.Transaction.itemPurchase')
    </div>
  </div> 

</div>

@endsection