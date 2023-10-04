<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function getLangFile($locale, $file)
    {
        $langFilePath = resource_path("lang/$locale/$file.php");

        $a = 1;
        if (file_exists($langFilePath)) {
            $data = require($langFilePath); // Load the PHP language file
            return response()->json($data);
        }

        return response()->json([]);
    }
}
