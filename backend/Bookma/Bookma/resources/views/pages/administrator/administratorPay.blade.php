@extends('layouts.ad')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->

<div class="row  mt-5">
    <div class="col-sm-3 col-xs-12">
     @include('conponents.administrator.administratorMenu')
    </div>
    <div class="col-sm-9 col-xs-12">
    @include('conponents.administrator.administratorPay')

    </div>
  </div> 

</div>

@endsection