@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
@include('conponents.top.banner')
@include('conponents.top.newArrival',
[
  'newBooks' => $newBooks
])
@include('conponents.top.list')
@include('conponents.top.bookLife')
@include('conponents.top.genreSarch')

@endsection
