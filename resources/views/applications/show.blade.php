@extends('layouts.app')

@section('content')

@include('comments.index', ['application' => $application])

@endsection