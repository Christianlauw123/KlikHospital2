<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User([
        	'email' => 'user1@email.com',
        	'password' => bcrypt('12345'),
        	'nama'=> 'user1',
        	'alamat' => 'mulyosari',
        	'kota' => 'sub',
        	'provinsi' => 'jatim',
        	'negara' => 'id',
        	'telepon' => '081222222',
        	'poin' => 100,
        	'wallet' => 53000,
        	'is_active' => 1,
        ]);
        $user1->save();

        $user2 = new User([
        	'email' => 'user2@email.com',
        	'password' => bcrypt('12345'),
        	'nama'=> 'user2',
        	'alamat' => 'mulyosari1',
        	'kota' => 'sub',
        	'provinsi' => 'jatim',
        	'negara' => 'id',
        	'telepon' => '081222222',
        	'poin' => 150,
        	'wallet' => 54000,
        	'is_active' => 1,
        ]);
        $user2->save();

        $user3 = new User([
        	'email' => 'user3@email.com',
        	'password' => bcrypt('12345'),
        	'nama'=> 'user3',
        	'alamat' => 'mulyosari2',
        	'kota' => 'sub',
        	'provinsi' => 'jatim',
        	'negara' => 'id',
        	'telepon' => '081222222',
        	'poin' => 150,
        	'wallet' => 54000,
        	'is_active' => 1,
        ]);
        $user3->save();
    }
}
