<?php

namespace App\Helpers;

use App\Models\Author;
use App\Models\Quote;
use Image;

class Helper
{

    public static function filter_quotes($category_ids, $author_id, $keyword)
    {
        //filter categories
        //escape empty && null errors
        if ($category_ids && $category_ids != '[]') {
            // Decode JSON Array because category_ids comes in encoded JSON stringify type. 
            $decoded_category_ids = json_decode($category_ids);
            $quotes = Quote::whereHas("categories", function ($q) use ($decoded_category_ids) {
                $q->whereIn("id", $decoded_category_ids);
            });
        } else {
            $quotes = Quote::query();
        }

        //filter author
        if ($author_id) {
            $quotes = $quotes->where("author_id", $author_id);
        }

        //filter search
        if ($keyword) {
            $quotes = $quotes->where("body", "like", "%" . $keyword . "%");
        }

        return $quotes->latest()->paginate(12)->appends(["category_ids" => $category_ids, "author_id" => $author_id, "keyword" => $keyword])->fragment("quotes_list_wrapper");
    }


    public static function filter_authors($category_ids, $keyword)
    {
        //filter by categories
        //escape empty && null errors
        if ($category_ids && $category_ids != '[]') {
            // Decode JSON Array because category_ids comes in encoded JSON stringify type. 
            $decoded_category_ids = json_decode($category_ids);
            $authors = Author::whereHas("quotes", function ($quotes) use ($decoded_category_ids) {
                $quotes->whereHas("categories", function ($q) use ($decoded_category_ids) {
                    $q->whereIn("id", $decoded_category_ids);
                });
            });
        }
        else {
            $authors = Author::query();
        }

        //filter search
        if ($keyword) {
            $authors = $authors->where("name", "like", "%" . $keyword . "%")
                            ->orwhere("biography", "like", "%" . $keyword . "%");
        }

        return $authors->orderBy("name", "asc")->paginate(15)->appends(["category_ids" => $category_ids, "keyword" => $keyword])->fragment("authors_list_wrapper");
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
