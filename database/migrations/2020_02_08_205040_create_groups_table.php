<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateGroupsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('groups', function(Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 128);
                $table->string('slug', 32)->unique();
                $table->string('secret', 32);
                $table->string('server', 32);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('sets');
            Schema::dropIfExists('groups');
        }
    }
