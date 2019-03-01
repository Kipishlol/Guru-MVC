<?php

function getRestaurantsFromPage($page)
{
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $page);
    $pattern = '/data-site-id="[0-9]+">(.+?)(<div class="place-story"|<link rel="stylesheet")/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    
    $rests = [];
    foreach ($result[0] as $restaurant) {
        $rest = [];
        $pattern = '/<a class="place-story__title__link" href="(\/restaurant\/[0-9a-z\-]{1,})">(.{1,}?)<\/a>/u';
        $result = [];
        preg_match_all($pattern, $restaurant, $result);
    
        $rest['name'] = $result[2][0];
        $rest['link'] = $result[1][0];
    
        $pattern = '/<dl class="row place-story__param"><dt class="col-xs-5 col-sm-3 place-story__param__title">(.{1,}?)<\/dt><dd class="col-xs-7 col-sm-9 place-story__param__content">(.{1,}?)<\/dd><\/dl>/u';
        $result = [];
        preg_match_all($pattern, $restaurant, $result);
        
        $rest['cuisine'] = $result[2][0];

        $rest['cuisine'] = explode(', ' , $rest['cuisine']);
        $rest['price'] = $result[2][1];

        $pattern = '/[0-9]+/u';
        $digits = [];
        preg_match_all($pattern,$rest['price'],$digits);
        $rest['price'] = [
              'price_min' => $digits[0][0],
              'price_max' => isset($digits[0][1]) ? $digits[0][1]: $digits[0][0]  # isset задает вопрос существует ли индекс если есть то он его возвращает(называется тернарный оператор(?  : ;))
        ];

        
        

        $rest['worktime'] = $result[2][2];
        $rest['address'] = $result[2][3];
    
        $rests[] = $rest;
    }
    
    return $rests;
}




function getMaxPage($toPage) 
{
    return 2;
    $subject = file_get_contents('https://restoran.kz/restaurant?page=' . $toPage);
    $pattern = '/restaurant\?page=([0-9]+)/u';
    $result = [];
    preg_match_all($pattern, $subject, $result);
    
    $max = $result[1][0];
    foreach ($result[1] as $page) {
        if ($page > $max) {
            $max = $page;
        }
    }

    if ($toPage == $max) {
        return $max;
    } else {
        return getMaxPage($max);
    }
}

?>