<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
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
        Author::factory()->count(10)->create();
        //regenerate authors url
        $authors = Author::all();
        for($i = 0; $i < count($authors); $i++) {
            $authors[$i]->url = Helper::transliterate_into_latin($authors[$i]->name);
            $authors[$i]->photo = ($i + 1) . '.jpg';
            $authors[$i]->save();
        }

        // quotes factory
        Quote::factory()->count(20)->create();

        //categories
        $categories = ['Арзиш ва ҳадафҳо', 'Ахлоқ ва масъулият', 'Ақли эҳсосӣ', 'Бадгумонӣ', 'Бунёди ҳастӣ', 'Дастовардҳо ва сахтгирӣ', 'Зиндагии ғайримаъмулӣ ', 'Идеалӣ ва оптимизм ', 'Илм ва Фалсафа', 'Интеллект ва тафаккур', 'Маънии ҳаёт ва хушбахтӣ', 'Маъруфияти илм', 'Мураббиягарӣ', 'Муҳаббат ба ҳаёт', 'Муҳити зист ва муносибат', 'Огоҳӣ', 'Олам ва космология', 'Ояндапажӯҳӣ', 'Роҳбар', 'Рушди шахсият', 'Сабки зиндагии солим', 'Салоҳиятнокӣ', 'Соҳибкорӣ', 'Тамаддун', 'Таърихи ҳаёт дар рӯи замин', 'Таҳсилот', 'Фанноварӣ', 'Хатарҳо ва хавфҳо', 'Худбоварӣ', 'Худидоракунӣ', 'Эрудиссия', 'Эҷодиёт', 'Қобилият ва Захираҳо', 'Ҳазли соҳавӣ', 'Ҷамъият', 'Ҷаҳонбинӣ'];

        foreach($categories as $cat) {
            Category::create([
                "name" => $cat,
                "url" => Helper::transliterate_into_latin($cat),
                "description" => "Здесь собраны лучшие цитаты, афоризмы и высказывания великих ученых и мыслителей, известных и успешных людей на предмет этой темы."
            ]);
        }

        // attach categories and quotes
        $quotes = Quote::all();
        foreach($quotes as $q) {
            $q->categories()->attach(rand(1, 15));
            $q->categories()->attach(rand(16, 30));
        }

    }

}
