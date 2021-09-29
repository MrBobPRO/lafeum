<?php

namespace Database\Seeders;

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
        //regenerate authors transliteration
        $authors = Author::all();
        for($i = 0; $i < count($authors); $i++) {
            $authors[$i]->transliteration = $this->transliterateIntoLatin($authors[$i]->name);
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
                "transliteration" => $this->transliterateIntoLatin($cat),
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

    private function transliterateIntoLatin($string)
    {
        $cyr = [
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я', ' ',
            'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ', 'Ғ', 'Ӣ', 'Ӯ', 'Ҳ', 'Қ', 'Ҷ',
            '/', '\\', '|', '!', '?'
        ];

        $lat = [
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','shb','a','i','y','e','yu','ya',
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','shb','a','i','y','e','yu','ya', '_',
            'i', 'u', 'h', 'q', 'j', 'g', 'g', 'i', 'u', 'h', 'q', 'j',
            '_', '_', '_', '_', '_'
        ];
        //Trasilate url
        $transilation = str_replace($cyr, $lat, $string);

        //return lowercased url
        return strtolower($transilation);
    }


}
