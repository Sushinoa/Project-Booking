<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.11.2016
 * Time: 16:56
 */

namespace App\Components;

class File
{
    public static function checkTypeFile($typeFile)
    {
        if (
            ($typeFile == 'image/png') ||
            ($typeFile == 'image/jpeg') ||
            ($typeFile == 'image/jpg')
        ) {
            return true;
        }
        return false;
    }

    public static function fileTransformation($nameFile, $typeFile, $tmp_nameFile)
    {

        $uploaddir = 'upload/';
        $pathFile = $uploaddir . $nameFile;

        $src = $tmp_nameFile; //путь к изображению лежащиму во временной папке
        list($src_width, $src_height) = getimagesize($src);
        $new_width = 160;
        $new_height = 160;
        if ($src_width < $new_width and $src_height < $new_height and $src_height == $new_height) {
            move_uploaded_file($tmp_nameFile, $pathFile);

        } else {

            if ($typeFile == 'image/jpeg')
                $src = imagecreatefromjpeg($src);
            if ($typeFile == 'image/png')
                $src = imagecreatefrompng($src);


            $dest = imagecreatetruecolor($new_width, $new_height);

            // вырезаем квадратную серединку по x, если фото горизонтальное
            if ($src_width > $src_height)
                imagecopyresized($dest, $src, 0, 0,
                    round((max($src_width, $src_height) - min($src_width, $src_height)) / 2),
                    0, $new_width, $new_height, min($src_width, $src_height), min($src_width, $src_height));

            // вырезаем квадратную середину по y,
            // если фото вертикальное
            if ($src_width < $src_height)
                imagecopyresized($dest, $src, 0, 0,
                    0, round((max($src_width, $src_height) - min($src_width, $src_height)) / 2),
                    $new_width, $new_height,
                    min($src_width, $src_height), min($src_width, $src_height));

            // квадратная картинка масштабируется без вырезок
            if ($src_width == $src_height)
                imagecopyresized($dest, $src, 0, 0, 0, 0, $new_width, $new_height, $src_width, $src_height);

            // вывод картинки и очистка памяти

            imagejpeg($dest, $pathFile, 100);
            imagedestroy($dest);
            imagedestroy($src);

        }

        return $pathFile;

    }
}