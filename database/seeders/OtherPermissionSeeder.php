<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class OtherPermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //permission unrelated to main app

        //permission for blogs
        // Permission::create(['name' => 'edit blogs']);
        // Permission::create(['name' => 'delete blogs']);
        // Permission::create(['name' => 'create blogs']);
        // Permission::create(['name' => 'list blogs']);

    }
}