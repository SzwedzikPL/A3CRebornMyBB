<?php

use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Badge\Model\BadgeGroup::class, 5)->create()->each(function ($badgeGroup) {
            factory(\App\Badge\Model\Badge::class, rand(0,3))->create(['badge_group_id' => $badgeGroup]);
        });
    }
}
