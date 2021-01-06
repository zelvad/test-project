<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;

class ApplicationController extends Controller
{

    /**
     * ApplicationController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $applications = Application::query()
            ->with('user')
            ->paginate(10);

        return view('admin.home', [
            'applications' => $applications
        ]);
    }

    /**
     * Edit invoice
     *
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Application $application)
    {
        $application->update([
            'status' => 1,
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    /**
     * Delete invoice
     *
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function delete(Application $application)
    {
        $application->delete();

        return redirect()->back();
    }
}
