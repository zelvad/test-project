<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;

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
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function create(ApplicationRequest $request)
    {
        Application::query()->create($request->all());

        return redirect()->back()->with('success', 'Заявка успешно добавлена!');
    }
}
