<?php

namespace App\Helpers;

use App\Models\Author;
use App\Models\Quote;
use Image;

class Helper
{

    public static function filter_quotes($category_id, $keyword)
    {
        //filter categories
        if ($category_id) {
            $quotes = Quote::whereHas("categories", function ($q) use ($category_id) {
                $q->where("id", $category_id);
            });
        } else {
            $quotes = Quote::query();
        }

        //filter search
        if ($keyword) {
            $quotes = $quotes->where("body", "like", "%" . $keyword . "%");
        }

        return $quotes->latest()->paginate(15)->appends(["category_id" => $category_id, "keyword" => $keyword])->fragment("quotes_list_wrapper");
    }


    public static function filter_authors($keyword)
    {
        //filter search
        if ($keyword) {
            $authors = Author::where("name", "like", "%" . $keyword . "%")
                    ->orwhere("biography", "like", "%" . $keyword . "%");
        } else {
            $authors = Author::query();
        }

        return $authors->orderBy("name", "asc")->paginate(15)->appends(["keyword" => $keyword])->fragment("authors_list_wrapper");
    }


    public static function transliterate_into_latin($string)
    {
        $cyr = [
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
            'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
            'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', ' ',
            'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ', 'Ғ', 'Ӣ', 'Ӯ', 'Ҳ', 'Қ', 'Ҷ',
            '/', '\\', '|', '!', '?', '«', '»', '“', '”'
        ];

        $lat = [
            'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
            'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya', '_',
            'i', 'u', 'h', 'q', 'j', 'g', 'g', 'i', 'u', 'h', 'q', 'j',
            '_', '_', '_', '_', '_', '_', '_', '_', '_'
        ];
        //Trasilate url
        $transilation = str_replace($cyr, $lat, $string);

        //return lowercased url
        return strtolower($transilation);
    }

    public static function delete_if_exists($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public static function rename_file_if_exists($path, $file)
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = '.' . $file->getClientOriginalExtension();
        $full_name = $name . $extension;

        while (file_exists(public_path($path) . $full_name)) {
            $name = $name . '(1)';
            $full_name = $name . $extension;
        }

        return $full_name;
    }

    public static function highlight_search($keyword, $text) 
    {
        return preg_replace("/" . $keyword . "/iu", "<span class='search-page__highlight'>" . $keyword .  "</span>", $text);
    }

}
