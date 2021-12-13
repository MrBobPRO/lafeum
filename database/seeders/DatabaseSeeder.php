<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Author;
use App\Models\Category;
use App\Models\Option;
use App\Models\Quote;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@mail.ru';
        $user->password = bcrypt('12345');
        $user->save();

        // authors factory
        Author::factory()->count(12)->create();
        //regenerate authors url
        $authors = Author::all();
        for($i = 0; $i < count($authors); $i++) {
            $authors[$i]->url = Helper::transliterate_into_latin($authors[$i]->name);
            $authors[$i]->photo = ($i + 1) . '.jpg';
            $authors[$i]->save();
        }

        //categories
        $categories = ['Арзиш ва ҳадафҳо', 'Ахлоқ ва масъулият', 'Ақли эҳсосӣ', 'Бадгумонӣ', 'Бунёди ҳастӣ', 'Дастовардҳо ва сахтгирӣ', 'Зиндагии ғайримаъмулӣ ', 'Идеалӣ ва оптимизм ', 'Илм ва Фалсафа', 'Интеллект ва тафаккур', 'Маънии ҳаёт ва хушбахтӣ', 'Маъруфияти илм', 'Мураббиягарӣ', 'Муҳаббат ба ҳаёт', 'Муҳити зист ва муносибат', 'Огоҳӣ', 'Олам ва космология', 'Ояндапажӯҳӣ', 'Роҳбар', 'Рушди шахсият', 'Сабки зиндагии солим', 'Салоҳиятнокӣ', 'Соҳибкорӣ', 'Тамаддун', 'Таърихи ҳаёт дар рӯи замин', 'Таҳсилот', 'Фанноварӣ', 'Хатарҳо ва хавфҳо', 'Худбоварӣ', 'Худидоракунӣ', 'Эрудиссия', 'Эҷодиёт', 'Қобилият ва Захираҳо', 'Ҳазли соҳавӣ', 'Ҷамъият', 'Ҷаҳонбинӣ'];



        foreach($categories as $cat) {
            $faker = Factory::create("ru_RU");
            Category::create([
                "name" => $cat,
                "url" => Helper::transliterate_into_latin($cat),
                "description" => $faker->realText($faker->numberBetween(50, 300))
            ]);
        }

        // attach categories and quotes
        for($i = 0; $i < 60; $i++) {
            $faker = Factory::create("ru_RU");
            $quote = new Quote();
            $quote->body = $faker->realText($faker->numberBetween(50, 1000));
            $quote->author_id = rand(1,12);
            $quote->popular = rand(0,1);
            $quote->save();
        }

        $quotes = Quote::all();
        foreach($quotes as $q) {
            $q->categories()->attach(rand(1, 15));
            $q->categories()->attach(rand(16, 30));
        }

        $option = new Option();
        $option->tag = "about__text";
        $option->key = "Роҷеъ ба сомона";
        $option->value = "<p>Хуш омадед, хонандаи муҳтарам.</p><p>Асоси сомона-ин иқтибосҳо ва афоризмҳо аз тамоми дунё, аз одамони комилан гуногун-шуҳратманд, на начандон машҳур, олимон, файласуфон аст. Гуфторҳои нишонрас ва ҳадафманди онҳо то рӯзҳои мо  расидаанд. Инсонҳои мазкур ба хотири саодати инсоният зиндагӣ ва эҷод кардаанд. Вақте бо андешаҳо ва гуфтори уламо ва мутафаккирони муосир ошно мешавед, метавон ба масоили мубрами ҷомеа посух дарёфт кард.</p><p>Мутолиаи хуш.</p>";
        $option->save();

    }

}
