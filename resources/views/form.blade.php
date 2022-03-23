@extends('layouts.app')

@section('content')
    <h1>Cast your Votes for {{ $group->name }}</h1>
    <div id="content__intro">
        <p>Please cast your vote on the entries listed below. You must vote for <strong>{{ env('VOTE_COUNT', 5) }}</strong> entries.</p>
        <p>Your votes are numbered 1-{{ env('VOTE_COUNT', 5) }}, with 1 being your top choice, corresponding to the buttons beside each entry.</p>

        @if($errors->any())
            <div class="alert alert--error">
                {{ $errors->first() }}
            </div>
        @endif
    </div>

    {{ Form::open([
        'url' => config('app.url') . $group->slug,
        'method' => 'POST',
    ]) }}
        {{ Form::hidden('token', $token) }}
        {{ Form::hidden('uuid', $uuid) }}

        <ul class="list--entries">
            @foreach($entries as $entry)
                <li class="entry">
                    <img class="entry__image" src="images/entries/{{ $entry->id }}.png" alt="" />

                    <div class="entry__details">
                        <h2 class="entry__name">{{ $entry->name }}</h2>
                        <small class="entry__authors">by {{ $entry->authors }}</small>
                    </div>

                    <div class="entry__votes radio-group">
                        @for($i = 1; $i <= env('VOTE_COUNT', 5); $i++)
                            {{ Form::radio("votes[$i]", $entry->id, false, [
                                'id' => "entry-{$entry->id}-$i",
                            ]) }}
                            {{ Form::label("entry-{$entry->id}-$i", $i) }}
                        @endfor
                    </div>
                </li>
            @endforeach
        </ul>

        <p>Make sure your votes are correct, you can't change them later.</p>

        <button class="btn">Submit</button>

    {{ Form::close() }}
@endsection
