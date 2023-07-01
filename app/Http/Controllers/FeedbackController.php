<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function store(Feedback $feedback, Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email'],
                'textInfo' => ['required', 'string', 'max:250'],
            ]
        );

        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->text = $request->input('textInfo');
        $feedback->save();

        session(['alert' => __("Feedback отправлен")]);

        return redirect(route("feedback"));
    }
}
