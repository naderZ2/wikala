<?php /** @noinspection ALL */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultant=
            [
                "name"=>'user',
                'phone'=>"0111",
                "country_id"=>"2",
                "email"=>"user@app.com",
                "birth_date"=>"2000-03-10",
                "password"=>"user",
                "image"=>"profiles/image.png"
            ];
        user::create($consultant);
    }
}
