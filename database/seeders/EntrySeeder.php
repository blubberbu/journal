<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Night in Shibuya', 'Hong Kong Cityscape', 'Shibuya Glitch', 'Swiss Mountain Range', 'Bali Sunset'];
        $images = ['images/jezael-melgoza-alY6_OpdwRQ-unsplash.jpg', 'images/manson-yim-lYDOrOkR_GU-unsplash.jpg', 'images/Shibuya-glitch.jpg', 'images/etienne-bosiger-WTkUYzNCu-A-unsplash.jpg', 'images/Bali-sunset.jpg'];
        $bodies = ['Photograph by: Jezael Melgoza (https://unsplash.com/photos/alY6_OpdwRQ)', 'Photograph by: Manson Yim (https://unsplash.com/photos/lYDOrOkR_GU)', 'Photograph by: Darian Jason', 'Photograph by: 
        Etienne Bösiger (https://unsplash.com/photos/WTkUYzNCu-A)', 'Photograph by: Darian Jason, 100% unedited'];

        //dummy data
        for ($i=0; $i < count($titles); $i++) { 
            Entry::create([
                'user_id' => 1,
                'title' => $titles[$i],
                'image' => $images[$i],
                'body' => $bodies[$i]
            ]);
        }
    }
}
