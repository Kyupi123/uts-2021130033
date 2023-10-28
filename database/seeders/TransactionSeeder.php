<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = ['income', 'expense'];
        $income = [
            'wage',
            'bonus',
            'gift',
        ];

        $expense = [
            'foodsdrinks',
            'shopping',
            'charity',
            'housing',
            'insurance',
            'taxes',
            'transportation',
        ];

        $faker = \Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            $amount = $faker -> randomFloat(3, 10000, 1000000);
            $type = $faker -> randomElement($cat);
            if ($type == 'income') {
                $category = $faker -> randomElement($income);
            } else if($type == 'expense'){
                $category = $faker -> randomElement($expense);
            } else {
                $category = 'uncategorized';
            }
            $note = $faker -> sentence(4);
            $created_at = $faker->dateTimeBetween('-10 years', 'now');

            DB::table('transactions')->insert([
                'amount' => $amount,
                'type' => $type,
                'category' => $category,
                'note' => $note,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}
