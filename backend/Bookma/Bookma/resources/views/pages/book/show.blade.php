@extends('layouts.app')

@section('content')
<div class="container mt-3">

<!-- ここにページ毎のコンテンツを書く -->


  <div class="row  mt-5">
    <div class="col-sm-6 col-xs-12">
     @include('conponents.DetailItem.itemImage')
    </div>
    <div class="col-sm-6 col-xs-12">
    @include('conponents.DetailItem.itemExplanation')
    </div>
  </div> 

</div>

@endsection