<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class GroupsTableSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('groups')->insert([
                'name' => 'Group 1',
                'slug' => 'group1',
                'secret' => env('GROUP_1_SECRET','group1'),
                'server' => 'voting1.rtgame.co.uk',
            ]);

            DB::table('groups')->insert([
                'name' => 'Group 2',
                'slug' => 'group2',
                'secret' => env('GROUP_2_SECRET', 'group2'),
                'server' => 'voting2.rtgame.co.uk',
            ]);

            DB::table('groups')->insert([
                'name' => 'Group 3',
                'slug' => 'group3',
                'secret' => env('GROUP_3_SECRET', 'group3'),
                'server' => 'voting3.rtgame.co.uk',
            ]);
        }
    }
