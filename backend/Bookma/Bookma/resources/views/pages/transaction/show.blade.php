@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->


  <div class="row  mt-5">
    <div class="col-sm-6 col-xs-12">
     @include('conponents.Transaction.transactionInformation')
    </div>
    <div class="col-sm-6 col-xs-12">
    @include('conponents.Transaction.detailTransaction')
    </div>
  </div> 

</div>

@endsection