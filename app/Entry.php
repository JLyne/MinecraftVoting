<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Entry extends Model {
        protected $table = 'entries';
        public $timestamps = false;

        public function votes(): BelongsToMany {
            return $this->belongsToMany(Vote::class, 'entry_votes', 'entry_id', 'vote_id')
                ->withPivot('rank');
        }

        public function group(): BelongsTo {
            return $this->belongsTo(Group::class);
        }
    }
