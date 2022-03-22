<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Vote extends Model {
        protected $table = 'votes';

        protected $fillable = ['uuid', 'group_id'];

        public function entries(): BelongsToMany {
            return $this->belongsToMany(Entry::class, 'entry_votes', 'vote_id', 'entry_id')
                ->withPivot('rank');
        }
    }
