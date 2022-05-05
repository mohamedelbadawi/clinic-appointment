<?php

namespace App\Http\traits;

use Carbon\Carbon;
use DateTime;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

trait helper
{

    function uploadImage($image, $path, $size, $name)
    {
        $filename = $name . '_' . time() . '_' . '.' . $image->getClientOriginalExtension();
        $path = public_path($path . $filename);
        Image::make($image->getRealPath())->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }
    function deleteImage($image, $path)
    {
        // dd($path . $image);
        if (File::exists($path . $image)) {
            unlink($path . $image);
        }
    }


    function hoursRange($lower = 0, $upper = 86400, $step = 3600, $format = '')
    {
        $times = array();

        if (empty($format)) {
            $format = 'g:i a';
        }
        $i = 0;
        foreach (range($lower, $upper, $step) as $increment) {
            $increment = gmdate('H:i', $increment);

            list($hour, $minutes) = explode(':', $increment);

            $date = new DateTime($hour . ':' . $minutes);

            $times[$i] = $date->format($format);
            $i++;
        }

        return $times;
    }
}
