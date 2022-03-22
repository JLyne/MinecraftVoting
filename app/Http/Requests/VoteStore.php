<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class VoteStore extends FormRequest {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize() {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules() {
            $rules = [
                'token' => 'required',
                'uuid' => 'required',
                'votes' => 'array',
                'votes.*' => 'numeric|exists:entries,id|distinct',
            ];

            for($i = 1; $i <= env('VOTE_COUNT', 5); $i++) {
                $rules['votes.' . $i] = 'required|distinct';
            }

            return $rules;
        }

        public function messages() {
            return [
                'uuid.*' => 'Token missing or invalid',
                'token.*' => 'Token missing or invalid',
                'votes.*.required' => 'Please select ' . env('VOTE_COUNT', 5) . 'entries to vote for',
                'votes.*.distinct' => 'You cannot vote for the same entry more than once',
                'votes.*.exists' => 'One or more of your votes were invalid',
                'votes.*.numeric' => 'One or more of your votes were invalid',
            ];
        }
    }
