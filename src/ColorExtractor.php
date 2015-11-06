<?php
namespace umneeq\colorextractor;

use Exception;
use League\ColorExtractor\Client as BaseColorExtractor;

/**
 * ColorExtractor
 *
 * @author Dmitry Chernikov <umneeq@gmail.com>
 */
class ColorExtractor
{
    /**
     * Extract colors from an image like a human would do.
     * @param string $imagePath
     * @param int $count. Max palette size
     * @param int $minColorRatio. Minimum ratio, below colors are ignored (0 - 1)
     * @return array of colors (hex codes)
     * @throws Exception if image type not one of the following: 'jpg', 'jpeg', 'png', 'gif'
     */
    public static function extract($imagePath, $count = 1, $minColorRatio = 0)
    {
        $client = new BaseColorExtractor;

        switch (getimagesize($imagePath)[2]) {
            case IMAGETYPE_JPEG:
                $image = $client->loadJpeg($imagePath);
                break;
            case IMAGETYPE_PNG:
                $image = $client->loadPng($imagePath);
                break;
            case IMAGETYPE_GIF:
                $image = $client->loadGif($imagePath);
                break;
            default:
                throw new Exception('Image type must be one of the following: JPEG(JPG), PNG, GIF.');
        }

        $image->setMinColorRatio($minColorRatio);
        return $image->extract($count);
    }
}
