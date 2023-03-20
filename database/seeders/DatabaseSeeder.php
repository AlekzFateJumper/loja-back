<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Fornecedor::create([
        'name'      => 'Fornecedor 1',
        'all_prod_url'     => 'http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/brazilian_provider',
        'single_prod_url'  => 'http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/brazilian_provider/<id>',
      ]);
      Fornecedor::create([
        'name'      => 'Fornecedor 2',
        'all_prod_url'     => 'http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/european_provider',
        'single_prod_url'  => 'http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/european_provider/<id>',
      ]);

      User::create([
        'name'      => 'Fulano',
        'email'     => 'fulano@teste.com',
        'password'  => bcrypt('$3nh@F0rt3'),
      ]);

    }
}
