@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
@include('conponents.top.banner')
@include('conponents.top.newArriva')
@include('conponents.top.list')
@include('conponents.top.bookLife.blade.php')
@include('conponents.top.genreSarch.blade.php')

@endsection
