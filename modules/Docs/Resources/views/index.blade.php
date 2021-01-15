@extends('docs::layouts.frontend')

@section('title', 'Docs')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {{ config('docs.name') }}
    </p>
@endsection
