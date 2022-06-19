<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $item=[
            'dashboard',
            'product',
            'category',
            'brand',
        ];
        $maxCount = count($item);
        $data = [];
        for ($i = 0; $i < $maxCount; $i++) {
            $data[] = [
                'name' => $item[$i],
                'guard_name' => 'web',
                'created_at' => now(),
            ];
        }
        $chunks = array_chunk($data, $maxCount);
        foreach ($chunks as $chunk) {
            Permission::insert($chunk);
        }

    }









}
