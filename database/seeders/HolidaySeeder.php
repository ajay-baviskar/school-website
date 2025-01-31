<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Holiday;

class HolidaySeeder extends Seeder
{
    public function run()
    {
        $holidays = [
            [
                'title' => 'New Year\'s Day',
                'description' => 'Celebration of the New Year',
                'holiday_date' => '2024-01-01',
                'type' => 'regular',
            ],
            [
                'title' => 'Republic Day',
                'description' => 'National holiday to honor the Republic of India.',
                'holiday_date' => '2024-01-26',
                'type' => 'regular',
            ],
            [
                'title' => 'Diwali',
                'description' => 'Festival of Lights',
                'holiday_date' => '2024-11-12',
                'type' => 'non_instruction',
            ],
            [
                'title' => 'Christmas (Sunday)',
                'description' => 'Christmas Day falls on Sunday this year.',
                'holiday_date' => '2024-12-25',
                'type' => 'sunday_falling',
            ],
        ];

        foreach ($holidays as $holiday) {
            Holiday::create($holiday);
        }
    }
}
