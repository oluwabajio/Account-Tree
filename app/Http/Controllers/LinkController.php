<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Returns the default link view with all links for authenticated
     * user
     * 
     * @return view
     */
    public function index()
    {
        $accounts = Auth::user()->accounts()
            ->withCount('visits')
            ->with('latestVisit')
            ->get();
        // return $links;
        return view('links.index', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Displays view for creating a new resource(link)
     *
     * @return view
     */
    public function create()
    {
        $payment_methods = PaymentMethod::all();

        return view('links.create', ['payment_methods' => $payment_methods]);
    }

    /**
     * Create a link resource
     *
     * @param Request $request
     * @return redirect to index action
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|max:255',
            'link' => 'required|url',
            'account_no' =>  'required|max:255'
        ]);

        $link = Auth::user()->accounts()
            ->create($request->only(['account_name', 'account_no', 'ling' => 'link', 'institution_name' => $request['user_name']]));

        if ($link) {
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    /**
     * Display an account with link to edit
     *
     * @param Account $account
     * @return view
     */
    public function edit(Account $account)
    {
        // enforcing that a user can edit only his/her own links
        if ($account->user_id !== Auth::id()) {
            return abort(404);
        }
        return view('links.edit', [
            'account' => $account
        ]);
    }

    /**
     * Updates an account resource
     *
     * @param Request $request
     * @param Account $account
     * @return redirect to index action
     */
    public function update(Request $request, Account $account)
    {
        // enforcing that a user can edit only his/her own links
        if ($account->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $account->update($request->only(['account_name', 'link']));

        return redirect()->to('/dashboard/links');
    }


    /**
     * Delete an account resource
     *
     * @param Request $request
     * @param Link $Link
     * @return redirect to index action
     */
    public function destroy(Request $request, Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }
        $account->delete();

        return redirect()->to('/dashboard/links');
    }
}
