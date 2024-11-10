<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ResponsesController extends Controller
{
    public function showResponses()
    {
        $files = Storage::disk('local')->files('responses');
        $allResponses = [];

        foreach ($files as $file) {
            $content = Storage::get($file);
            $response = json_decode($content, true);
            $allResponses[] = $response;
        }

        return view('responses', ['allResponses' => $allResponses]);
    }
}
