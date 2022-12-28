<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('categorias')->insert(
        //     array(
        //         'id' => 1,
        //         'cat_name' => 'Categoria Padrão',
        //         'cat_order' => 1,
        //         'cat_del' => 0
        //     )
        // );

        // DB::table('produtos')->insert(
        //     array(
        //         'id' => 1,
        //         'pro_name' => 'Produto Exemplo',
        //         'pro_description' => 'Descrição de produto exemplo',
        //         'pro_order' => 1,
        //         'pro_del' => 0,
        //         'pro_image' => null,
        //         'cat_id' => 1
        //     )
        // );
        DB::table('companies')->insert(
            array(
                'id' => 1,
                'com_number' => '(99)99999-9999',
                'com_mail' => 'email@email.com',
                'com_history' => 'Placeholder Placeholder, Placeholder, Placeholder Placeholder',
                'com_values' => 'Placeholder Placeholder, Placeholder, Placeholder Placeholder2',
            )
        );
    }
}
