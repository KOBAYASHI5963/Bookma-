@extends('layouts.common')
 
@section('title', 'インデックスページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="/css/star/index.css" rel="stylesheet">
@endsection
 
@include('layouts.header')
 

@include('layouts.top.banner')
@include('layouts.top.a')
@include('layouts.top.b')
@include('layouts.top.c')
@include('layouts.top.d')
 

@include('layouts.footer')
