<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Domain\Book\Models\Book;
use App\Domain\Store\Models\Store;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        for ($i = 1; $i <= 10; $i++) {
            $book = Book::find($i);

            for ($j = 1; $j <= 10; $j++) {
                $store = Store::find($j);

                // Adicione o livro à loja e defina os timestamps manualmente
                $store->books()->attach($book->id, [
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
        }
    }
}
