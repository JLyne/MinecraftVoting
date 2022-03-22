<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Group extends Model {
        protected $table = 'groups';
        public $timestamps = false;

        public function entries(): HasMany {
            return $this->hasMany(Entry::class, 'group_id', 'id');
        }
    }
