<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\VoteStore;
use App\Group;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller {
    public function form(Request $request, Group $group) {
        $entries = $group->entries()->get();

        return view('form', [
            'group' => $group,
            'token' => $request->get('token'),
            'uuid' => $request->get('uuid'),
            'entries' => $entries,
        ]);
    }

    public function submit(VoteStore $request, Group $group) {
        $vote = Vote::create([
            'uuid' => $request->get('uuid'),
            'group_id' => $group->id,
        ]);

        foreach($request->get('votes') as $rank => $entry) {
            $vote->entries()->attach(Entry::find($entry), ['rank' => (env('VOTE_COUNT', 5) + 1) - $rank]);
        }

        return redirect(route('complete'));
    }

    public function complete() {
        return view('complete');
    }
}
