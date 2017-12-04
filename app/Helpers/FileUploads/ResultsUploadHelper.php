<?php

namespace App\Helpers\FileUploads;

class ResultsUploadHelper
{
    public static function parse_csv_file($file)
    {
    $results = array();

        $file = fopen($file, 'rb');
        while (! feof($file)) {
            $result = fgetcsv($file);
            if ($result === false) continue;
            $results[] = $result;
        }

        return $results;
    }
}