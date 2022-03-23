@extends('layouts.app')

@section('content')
    <h1>Invalid token</h1>
    <p id="content__intro">Sorry, your token is invalid. Please try getting a fresh token from the voting server.</p>

    <p>Not sure how? Follow these steps:</p>

    <ol id="content__steps">
        <li>
            <h2>Launch Minecraft</h2>
            <p>You'll need to use Java Edition 1.18.2 or Bedrock Edition 1.18.12</p>
        </li>
        <li>
            <h2>Connect to the voting server</h2>
            <p>Each group of entries has a separate voting server:</p>
            <ul>
                @foreach($groups as $group)
                <li>{{ $group->name }}: <strong>{{ $group->server }}</strong></li>
                @endforeach
            </ul>
        </li>
        <li>
            <h2>Click the <code>[Cast your Votes]</code> button</h2>
            <p>You'll find it in the chat, shown below</p>
            <img src="images/voting-step-3.png" alt="" />
        </li>
        <li>
            <h2>Cast your votes!</h2>
        </li>
    </ol>

    {{ view('parts/help') }}
@endsection
