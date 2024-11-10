<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    public function showSurvey()
    {
        return view('survey');
    }

    public function submitSurvey(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|in:male,female,other',
            'rating' => 'required|integer|between:1,5',
            'comments' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect('/survey')
                ->withErrors($validator)
                ->withInput();
        }

        $response = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'rating' => $request->input('rating'),
            'comments' => $request->input('comments'),
            'submitted_at' => now()->addHours(3),
        ];

        $filename = 'response_' . uniqid() . '.json';
        Storage::disk('local')->put("responses/{$filename}", json_encode($response));

        return redirect('/survey')->with('success', 'Анкета успешно отправлена!');
    }
}
