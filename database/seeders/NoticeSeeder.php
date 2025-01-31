<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notice::create([
            'name' => 'New Notice Title',
            'desc' => 'This is a sample notice description.',
            'status' => true,
            'url_name' => 'https://example.com/more-info',
            'date' => now(),
        ]);

        Notice::create([
            'name' => 'Second Notice Title',
            'desc' => 'Another example notice with a different description.',
            'status' => true,
            'url_name' => null,
            'date' => now()->subDays(2),
        ]);
    }
}
