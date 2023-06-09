<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Queries\FeedbacksQueryBuilder;
use Illuminate\Http\Request;
use App\Http\Requests\Feedback\Store;
use App\Http\Requests\Feedback\Update;

class FeedbackController extends Controller
{
    public function index(FeedbacksQueryBuilder $feedbacksQueryBuilder)
    {
        $feedback = $feedbacksQueryBuilder->getFeedbacks();
        return view('admin.feedback.index', compact('feedback'));
    }

    public function create()
    {
        return view('admin.feedback.create');
    }

    public function store(Feedback $feedback, Store $request)
    {
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->text = $request->input('textInfo');
        $feedback->save();

        session(['alert' => __("Feedback создан")]);

        return redirect(route("admin.feedback.index"));
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', compact('feedback'));
    }

    public function update(Feedback $feedback, Update $request)
    {
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->text = $request->input('textInfo');
        $feedback->save();

        session(['alert' => __("Feedback сохранен")]);

        return redirect(route("admin.feedback.index"));
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        session(['alert' => __("Feedback " . $feedback->id . " успешно удален")]);
    }
}
