<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Callback;

class CallbackController extends Controller
{

    /**
     * CallbackController constructor.
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
        $callbacks = Callback::query()
            ->with('user')
            ->paginate(10);

        return view('admin.home', [
            'callbacks' => $callbacks
        ]);
    }

    /**
     * Edit invoice
     *
     * @param Callback $invoice
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Callback $invoice)
    {
        $invoice->first()->update([
            'status' => 1,
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    /**
     * Delete invoice
     *
     * @param Callback $invoice
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function delete(Callback $invoice)
    {
        $invoice->first()->delete();

        return redirect()->back();
    }
}
