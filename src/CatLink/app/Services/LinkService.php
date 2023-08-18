<?php

namespace App\Services;

class LinkService
{
    public static function normalize_category($category)
    {
        $category = trim($category);
        $category = trim($category, '/');
        $category_list = explode('/', $category);

        $category_path = '';
        foreach($category_list as $category)
        {
            $category = trim($category);
            $category = preg_replace('/\s+/', ' ', $category);
            $category_path .= "/$category";
        }

        return $category_path;
    }
}
