<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\Feedback\Store;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function store(Feedback $feedback, Store $request)
    {

        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->text = $request->input('textInfo');
        $feedback->save();

        session(['alert' => __("Feedback отправлен")]);

        return redirect(route("feedback"));
    }
}
