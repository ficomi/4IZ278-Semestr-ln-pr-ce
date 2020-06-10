<?php

use Illuminate\Database\Seeder;
use App\Books;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(booksseed::class);
    }
}

class booksseed extends Seeder
{
    public function run()
    {
        Books::create(['name' => 'detskename', 'author' => 'Protrhlá', 'image' => 'imageurl', 'genre' => 'Dětské', 'language' => 'cs', 'published_in' => '1872', 'price' => '25']);
        Books::create(['name' => 'detskename2', 'author' => 'Kundibát', 'image' => 'imageurl', 'genre' => 'Dětské', 'language' => 'cs', 'published_in' => '1972', 'price' => '250']);
        Books::create(['name' => 'beletriename', 'author' => 'Kubásek', 'image' => 'imageurl', 'genre' => 'Beletrie', 'language' => 'cs', 'published_in' => '1892', 'price' => '2500']);
        Books::create(['name' => 'beletriename2', 'author' => 'Waller', 'image' => 'imageurl', 'genre' => 'Beletrie', 'language' => 'cs', 'published_in' => '1872', 'price' => '20']);
        Books::create(['name' => 'detektivkyname', 'author' => 'Lindler', 'image' => 'imageurl', 'genre' => 'Detektivka', 'language' => 'cs', 'published_in' => '1872', 'price' => '205']);
        Books::create(['name' => 'fantasyname', 'author' => 'Malej', 'image' => 'imageurl', 'genre' => 'Fantasy a Sci-fi', 'language' => 'cs', 'published_in' => '1872', 'price' => '350']);
        Books::create(['name' => 'popname', 'author' => 'Banán', 'image' => 'imageurl', 'genre' => 'Populárně naučné', 'language' => 'cs', 'published_in' => '1872', 'price' => '350']);
        $user=User::create(['name' => 'test', 'email' => 'test@test.com', 'password' => Hash::make('testtest')]);
        $user->shoppingcart()->create();
        $user->wishlist()->create();
        $user=User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('adminadmin'), 'type'=>'admin']);
        $user->shoppingcart()->create();
        $user->wishlist()->create();
    }

}
