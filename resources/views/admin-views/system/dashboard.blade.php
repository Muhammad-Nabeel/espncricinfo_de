@extends('layouts.back-end.app')

@section('title', 'Dashboard')

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section('content')
    <h2 style="font-weight:600;">Welcome,Admin Dashboard</h2>
@endsection