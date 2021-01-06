<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallbackRequest;
use App\Models\Callback;

class HomeController extends Controller
{

    /**
     * Index page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        return view('home');
    }

    /**
     * Create invoice
     *
     * @param CallbackRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function create(CallbackRequest $request)
    {
        Callback::query()->create($request->all());

        return redirect()->back()->with('success', 'Заявка успешно добавлена!');
    }
}
