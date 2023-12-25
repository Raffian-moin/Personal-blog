<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        $settings = [
            [
                'group' => 'general',
                'key'   => 'site_name',
                'value' => 1,
            ],
            [
                'group' => 'general',
                'key'   => 'site_title',
                'value' => 1,
            ],
            [
                'group' => 'general',
                'key'   => 'fav_icon',
                'value' => 1,
            ],
            [
                'group' => 'general',
                'key'   => 'site_logo',
                'value' => 1,
            ],
            [
                'group' => 'social',
                'key'   => 'twitter',
                'value' => 1,
            ],
            [
                'group' => 'social',
                'key'   => 'facebook',
                'value' => 1,
            ],
            [
                'group' => 'social',
                'key'   => 'instagram',
                'value' => 1,
            ],
            [
                'group' => 'social',
                'key'   => 'linkedin',
                'value' => 1,
            ],
            [
                'group' => 'social',
                'key'   => 'github',
                'value' => 1,
            ],
        ];

        DB::transaction(function () use ($settings) {
            foreach ($settings as $setting) {
                Setting::create($setting);
            }
        });
    }
}
