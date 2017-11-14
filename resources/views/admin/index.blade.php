@extends('layouts.admin')


@section('content')
    <h1>Dashboard {{Auth::user()->name}}</h1>


@endsection
