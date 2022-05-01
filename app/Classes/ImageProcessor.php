<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageProcessor
{
    public static function process ($path, $image) : string
    {
        $decodedImage = static::decode($image);
        $imageName = static::getName($image);

        if (config('app.env') === 'production') {
            Storage::disk('s3')->put($path . '/' . $imageName, $decodedImage, 'public');

            return Storage::disk('s3')->url($path . '/' . $imageName);
        }

        Storage::put($path . '/' . $imageName, $decodedImage, 'public');

        return Storage::url($path . '/' . $imageName);
    }

    public static function decode($image) : bool|string
    {
        return base64_decode(explode(',', $image)[1]);
    }

    public static function getName($image) : string
    {
        return static::getHash() . '_' . now()->format('Ymd_His') . '.' . static::getExtension($image);
    }

    public static function getExtension($image) : string
    {
        return explode(
            '/',
            explode(':', substr($image, 0, strpos($image, ';')))[1]
        )[1];
    }

    protected static function getHash(string $algorithm = 'sha256', int $length = 10): string
    {
        return substr(hash($algorithm, Str::random(10)), 0, $length);
    }
}
