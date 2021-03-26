@extends('tours::layouts.frontend')

@section('title', 'Tours')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {{ config('tours.name') }}
    </p>
@endsection
