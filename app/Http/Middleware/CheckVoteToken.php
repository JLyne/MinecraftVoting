<?php

namespace App\Http\Middleware;

use App\Group;
use App\Vote;
use Closure;
use Illuminate\Http\Request;

class CheckVoteToken {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle(Request $request, Closure $next) {
        $group = $request->route('group');
        $token = $request->get('token', '');
        $uuid = $request->get('uuid', '');

        if(empty($group) || !$this->isValidToken($group, $token, $uuid)) {
            return response(view('invalid-token', ['groups' => Group::all()]), 401);
        }

        if($this->hasAlreadyVoted($group, $uuid)) {
            return response(view('already-voted', ['group' => $group]), 401);
        }

        return $next($request);
    }

    private function isValidToken(Group $group, string $token, string $uuid) {
        if(!$token || !$uuid || strlen($uuid) % 2) {
            return false;
        }

        $hmac = hash_hmac('sha256', hex2bin($uuid), $group->secret);

        if($hmac !== $token) {
            return false;
        }

        return true;
    }

    private function hasAlreadyVoted(Group $group, string $uuid) {
        return Vote::where([
            'group_id' => $group->id,
            'uuid' => $uuid
        ])->exists();
    }
}
