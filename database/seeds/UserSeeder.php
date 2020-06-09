<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Movie;
use App\Schedule;
use App\Ticket;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $users=[
            [
                 "type_user"=> 1,
                 "name"=> "Jhorman Duvan",
                 "lastname"=> "Vacca Manzano",
                 "email"=> "jvacca@gmail.com",
                 "phone"=> "30145236589",
                 "picture"=> "3.svg",
                 "password"=> '0000'
             ],
             [
                 "type_user"=> 1,
                 "name"=> "Sebastian",
                 "lastname"=> "Ayala Suarez",
                 "email"=> "sayala@gmail.com",
                 "phone"=> "3124578596",
                 "picture"=> "1.svg",
                 "password"=> '0000'
             ],
             [
                 "type_user"=> 2,
                 "name"=> "Jose Luis",
                 "lastname"=> "Nova Arguello",
                 "email"=> "jnova@gmail.com",
                 "phone"=> "3058967412",
                 "picture"=> "7.svg",
                 "password"=> '0000'
             ],
             [
                 "type_user"=> 2,
                 "name"=> "Diego Armando",
                 "lastname"=> "Maradona Pérez",
                 "email"=> "dmaradona@gmail.com",
                 "phone"=> "3201789656",
                 "picture"=> "4.svg",
                 "password"=> '0000'
             ]
         ];
         
         foreach($users as $user){
            User::create($user);
         }
        

         $movies =[
            [
                "name" => "Avengers End-Game",
                "max_num"=> 20,
                "price"=> 10000,
                "picture" => '/img/1.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "name"=> "Bumblebee",
                "max_num"=> 10,
                "price"=> 10000,
                "picture" => '/img/2.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "name"=> "El Irlandés",
                "max_num"=> 15,
                "price"=> 8000,
                "picture" => '/img/3.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "name"=> "Aves de Presa",
                "max_num"=> 18,
                "price"=> 9000,
                "picture" => '/img/4.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "name"=> "Bad Boys II",
                "max_num"=> 25,
                "price"=> 12000,
                "picture" => '/img/5.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ],
            [
                "name"=> "Sonic",
                "max_num"=> 20,
                "price"=> 10000,
                "picture" => '/img/6.jpg',
                "created_at" => $now,
                "updated_at" => $now
            ]
        ];
        foreach($movies as $movie){
            Movie::create($movie);
        }


        $Schedule=[
            [
                "id_movies"=> 1,
                "schedule"=> "05:30 PM"
            ],
            [
                "id_movies"=> 1,
                "schedule"=> "06:00 PM"
            ],
            [
                "id_movies"=> 2,
                "schedule"=> "05:30 PM"
            ],
            [
                "id_movies"=> 2,
                "schedule"=> "08:00 PM"
            ],
            [
                "id_movies"=> 2,
                "schedule"=> "09:00 PM"
            ],
            [
                "id_movies"=> 3,
                "schedule"=> "05:00 PM"
            ],
            [
                "id_movies"=> 4,
                "schedule"=> "08:30 PM"
            ],
            [
                "id_movies"=> 4,
                "schedule"=> "08:00 PM"
            ],
            [
                "id_movies"=> 5,
                "schedule"=> "06:10 PM"
            ],
            [
                "id_movies"=> 5,
                "schedule"=> "07:20 PM"
            ],
            [
                "id_movies"=> 5,
                "schedule"=> "09:00 PM"
            ],
            [
                "id_movies"=> 6,
                "schedule"=> "04:30 PM"
            ],
            [
                "id_movies"=> 6,
                "schedule"=> "06:25 PM"
            ],
            [
                "id_movies"=> 6,
                "schedule"=> "08:00 PM"
            ],
            [
                "id_movies"=> 6,
                "schedule"=> "10:00 PM"
            ],
            
        ];

        foreach($Schedule as $Schedu){
            Schedule::create($Schedu);
        }
            
    }
}
