<?php

    namespace Database\Seeders;

    use App\Group;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class EntriesTableSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $entry_groups = [
                'group1' => [
                    [
                        'id' => 1,
                        'name' => 'Minimalism',
                        'authors' => 'LadanTF2',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Blackstone Hub',
                        'authors' => 'KalebCaine',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Oasis',
                        'authors' => 'LadanTF2',
                    ],
                    [
                        'id' => 5,
                        'name' => 'Dreaded\'s Hub',
                        'authors' => 'DoctorDreaded',
                    ],
                    [
                        'id' => 8,
                        'name' => 'Dreaded\'s Hub 2',
                        'authors' => 'DoctorDreaded',
                    ],
                    [
                        'id' => 9,
                        'name' => 'Lush Caves',
                        'authors' => '+periuwu5882',
                    ],
                    [
                        'id' => 12,
                        'name' => 'Floating Nether Island',
                        'authors' => 'hgrtgjj',
                    ],
                    [
                        'id' => 15,
                        'name' => 'Freemonger 3000',
                        'authors' => 'JimbusKhan',
                    ],
                    [
                        'id' => 22,
                        'name' => 'Portal Forest',
                        'authors' => 'PrinceTrellis',
                    ],
                    [
                        'id' => 24,
                        'name' => 'CrispFriedHannah\'s Entry',
                        'authors' => 'CrispFriedHannah',
                    ],
                    [
                        'id' => 28,
                        'name' => 'Grassy Cliffs',
                        'authors' => 'ThiskyWhisky',
                    ],
                ],

                'group2' => [
                    [
                        'id' => 4,
                        'name' => '1952',
                        'authors' => 'YourLocalPiebro',
                    ],
                    [
                        'id' => 7,
                        'name' => 'Skyblock',
                        'authors' => 'KEVON13579',
                    ],
                    [
                        'id' => 11,
                        'name' => 'Library',
                        'authors' => 'Tklots',
                    ],
                    [
                        'id' => 13,
                        'name' => 'Abovearth\'s Entry',
                        'authors' => 'abovearth',
                    ],
                    [
                        'id' => 17,
                        'name' => 'Storms_Island',
                        'authors' => 'SierraStorms',
                    ],
                    [
                        'id' => 18,
                        'name' => 'The Crystal Valley',
                        'authors' => 'Ravenpuffe',
                    ],
                    [
                        'id' => 19,
                        'name' => 'Sakura Gardens',
                        'authors' => 'CrispyMiner',
                    ],
                    [
                        'id' => 23,
                        'name' => 'Colourful server',
                        'authors' => 'planetlaura',
                    ],
                    [
                        'id' => 26,
                        'name' => 'Atlantic Kingdom',
                        'authors' => 'Jifturtles',
                    ],
                    [
                        'id' => 27,
                        'name' => 'Storms_Penguins',
                        'authors' => 'SierraStorms',
                    ],
                    [
                        'id' => 29,
                        'name' => 'The Library',
                        'authors' => 'WhimsyBridges',
                    ],
                    [
                        'id' => 34,
                        'name' => 'RT Galaxy',
                        'authors' => 'FunnyPan',
                    ],
                    [
                        'id' => 35,
                        'name' => 'RTGalaxTree',
                        'authors' => '_Cynder_, ValentinT, Tklots, WhimsyBridges, LonkReborn',
                    ],
                ],

                'group3' => [
                    [
                        'id' => 6,
                        'name' => 'RTManor',
                        'authors' => 'Senor_Kevin',
                    ],
                    [
                        'id' => 10,
                        'name' => 'Sakura',
                        'authors' => 'Artist_Zero',
                    ],
                    [
                        'id' => 14,
                        'name' => 'Harristown Forest',
                        'authors' => 'JimbusKhan, ICommitTaxEvade, Aerrro, TicTacTin, Personman6000, _ColdDestroy_',
                    ],
                    [
                        'id' => 16,
                        'name' => 'Gateway',
                        'authors' => 'KEVON13579',
                    ],
                    [
                        'id' => 20,
                        'name' => 'Server Museum',
                        'authors' => 'pteroboy',
                    ],
                    [
                        'id' => 21,
                        'name' => 'The hidden Castle',
                        'authors' => 'Lord_Primordius, KEVON13579, Andrew1355, jamesmarkwaller, Oa6ix, Badwolfe44',
                    ],
                    [
                        'id' => 25,
                        'name' => 'Palatium Hills',
                        'authors' => 'Aerrro, G0rd0nFreeman, ArtyRachel',
                    ],
                    [
                        'id' => 30,
                        'name' => 'The Grand Library',
                        'authors' => 'WhimsyBridges, LonkReborn',
                    ],
                    [
                        'id' => 31,
                        'name' => 'Temple of RT',
                        'authors' => 'TYPE_KENYE_03, G0rd0nFreeman',
                    ],
                    [
                        'id' => 32,
                        'name' => 'Cozy Lodge',
                        'authors' => 'Trainerchris2',
                    ],
                    [
                        'id' => 33,
                        'name' => 'Courth of Eastern Wei',
                        'authors' => 'TYPE_KENYE_03',
                    ],
                ],
            ];

            foreach($entry_groups as $group_slug => $entries) {
                $group = Group::where('slug', $group_slug)->first();

                foreach($entries as $entry) {
                    DB::table('entries')->insert(array_merge([
                        'group_id' => $group->id,
                    ], $entry));
                }
            }
        }
    }
