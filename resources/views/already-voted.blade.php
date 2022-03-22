@extends('layouts.app')

@section('content')
    <h1>You have already placed votes for {{ $group->name }}.</h1>
    <p id="content__intro">Sorry, you may only vote once per group, and it appears you have already voted.</p>
    {{ view('parts/help') }}
@endsection
