<?php

namespace App\Classes;

use Storage;
use File;

/**
 * Handles the file uploading and deleting
 *
 * @author Frank Wichers Schreur <f.wichers@texemus.com>
 * @author Wouter van Marrum <w.vanmarrum@texemus.com>
 */
class FileHandler
{
    /**
     * Handles the image uploading for the entity
     *
     * @author Wouter van Marrum <w.vanmarrum@texemus.com>
     *
     * @param string  $location  The file location
     * @param string  $upload    The uploaded file content
     * @param object  $entity    The entity object
     *
     * @return string  Returns the path to the file that has been uploaded.
     */
    public static function upload($location, $upload, $entity)
    {
        if (!is_null($entity->image)) {
            self::delete($entity->image);
        }

        $originalFilename   = str_replace($upload->getClientOriginalExtension(), '', $upload->getClientOriginalName());
        $newFileName        = uniqid() . '_' . str_slug($originalFilename) . '.' . $upload->getClientOriginalExtension();

        return Storage::disk('local')->putFileAs("/public/$location", $upload, $newFileName);
    }

    /**
     * Deletes the file for the given location.
     *
     * @author Wouter van Marrum <w.vanmarrum@texemus.com>
     *
     * @param string  $location  The file location
     */
    public static function delete($location)
    {
        Storage::delete($location);
    }
}
