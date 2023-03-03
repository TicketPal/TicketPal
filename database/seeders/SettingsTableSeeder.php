<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Settings::create([
			'setting' => 'general',
			'icon' => 'fas fa-cog',
			'title' => 'General Setting\'s',
			'key' => 'Website title',
			'value' => '',
		]);
		Settings::create([
			'setting' => 'general',
			'icon' => 'fas fa-cog',
			'title' => 'General Setting\'s',
			'key' => 'Website URL',
			'value' => '',
		]);
		Settings::create([
			'setting' => 'general',
			'icon' => 'fas fa-cog',
			'title' => 'General Setting\'s',
			'key' => 'Website EMail',
			'value' => '',
		]);
    }
}
