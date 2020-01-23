<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class Replaces
{

    /**
     * replace string from text.
     * @param String $pattern select the id.
     * @return String
     */
    public static function getString ($string)
    {
        //point to user
        $pattern = "/(?<=@@USER<).*?(?=>)/";

        //matches[pattern] will contain the text that matched the full pattern,
        //matches[text] will have the text that matched.
        preg_match($pattern,$string,$reslute);


        $user = $reslute;

        //Search user
        $user = \App\Models\User::where('id', $user)->first();

        //the $placeholder is user->id.
        $placeholder = '@@USER<' . $user->id . '>';

        //chnge the $placeholder to User->name and give on text
        $output = str_replace($placeholder, $user->name, $string);

        return $output;
    }

    /**
     * replace string from text.
     * @param String $pattern select the id.
     * @return String
     */
    public static function getImage($file)
    {

        //point to file
        $pattern='/@@AFBEELDING<(([^\"]+))>/';

        //give taht to image
        $replace="<img src=../images/$1 width=\"100\" height=\"100\"/></a>";


        //chnge the $pattern to replace and give on file
        $file = preg_replace($pattern,$replace,$flie);

        return $file;

    }

}

// hier call you method image ($file)
// // $file = 'vds @@AFBEELDING<loop.png> venenaa vitae elit libero, a pharetra au';
//
// // $file = Replaces::getImage($file);
//
// // dd($text);
//
//
//hier call you method User ($string)
// $string = 'vds @@USER<222> venenaa vitae elit libero, a pharetra au';
//
// $string = Replaces::getString($string);
//
// // dd($text);
// return $string;
