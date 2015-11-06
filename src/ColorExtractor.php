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
     * @param string $imgPath
     * @param int $count
     * @param int $minColorRatio
     * @return array
     * @throws Exception
     */
    public static function extract($imgPath, $count = 1, $minColorRatio = 0)
    {
        $client = new BaseColorExtractor;

        switch (getimagesize($imgPath)[2]) {
            case IMAGETYPE_JPEG:
                $image = $client->loadJpeg($imgPath);
                break;
            case IMAGETYPE_PNG:
                $image = $client->loadPng($imgPath);
                break;
            case IMAGETYPE_GIF:
                $image = $client->loadGif($imgPath);
                break;
            default:
                throw new Exception('Image type must be one of the following: JPEG(JPG), PNG, GIF.');
        }

        $image->setMinColorRatio($minColorRatio);
        return $image->extract($count);
    }
}
