<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEntryVotesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('entry_votes', function(Blueprint $table) {
                $table->unsignedBigInteger('vote_id');
                $table->unsignedBigInteger('entry_id');
                $table->bigInteger('rank');
                $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
                $table->foreign('entry_id')->references('id')->on('entries')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('entry_votes');
        }
    }
