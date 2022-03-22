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
                    'Minimalism' => 'LadanTF2',
                    'Blackstone Hub' => 'KalebCaine',
                    'Oasis' => 'LadanTF2',
                    'Dreaded\'s Hub' => 'DoctorDreaded',
                    'Dreaded\'s Hub (2)' => 'DoctorDreaded',
                    'Lush Caves' => '. +periuwu5882',
                    'Floating Nether Island' => 'hgrtgjj',
                    'Freemonger 3000' => 'JimbusKhan',
                    'Portal Forest' => 'PrinceTrellis',
                    'CrispFriedHannah\'s Entry' => 'CrispFriedHannah',
                    'Grassy Cliffs' => 'ThiskyWhisky',
                ],

                'group2' => [
                    '1952' => 'YourLocalPiebro',
                    'Skyblock' => 'KEVON13579',
                    'Library' => 'Tklots',
                    'abovearth' => 'abovearth',
                    'Storms_Island' => 'SierraStorms',
                    'The Crystal Valley' => 'Ravenpuffe',
                    'Sakura Gardens' => 'CrispyMiner',
                    'Colourful server' => 'planetlaura',
                    'Atlantic Kingdom' => 'Jifturtles',
                    'Storms_Penguins' => 'SierraStorms',
                    'Library ' => 'WhimsyBridges',
                    'RT Galaxy' => 'FunnyPan',
                    'RTGalaxTree' => '_Cynder_, ValentinT, Tklots, WhimsyBridges, LonkReborn',
                ],

                'group3' => [
                    'RTManor' => 'Senor_Kevin',
                    'Sakura' => 'Artist_Zero',
                    'Harristown Forest' => 'JimbusKhan, ICommitTaxEvade, Aerrro, TicTacTin, Personman6000, _ColdDestroy_',
                    'Gateway' => 'KEVON13579',
                    'Server Museum' => 'pteroboy',
                    'The hidden Castle' => 'Lord_Primordius, KEVON13579, Andrew1355, jamesmarkwaller, Oa6ix, Badwolfe44',
                    'Palatium Hills' => 'Aerrro, G0rd0nFreeman, ArtyRachel',
                    'The Grand Library' => 'WhimsyBridges, LonkReborn',
                    'Temple of RT' => 'TYPE_KENYE_03, G0rd0nFreeman',
                    'Cozy Lodge' => 'Trainerchris2',
                    'Courth of Eastern Wei' => 'TYPE_KENYE_03',
                ],
            ];

            foreach($entry_groups as $group_slug => $entries) {
                $group = Group::where('slug', $group_slug)->first();

                foreach($entries as $name => $authors) {
                    DB::table('entries')->insert([
                        'group_id' => $group->id,
                        'name' => $name,
                        'authors' => $authors,
                    ]);
                }
            }
        }
    }
