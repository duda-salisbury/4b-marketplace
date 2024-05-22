<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealer;

class DealerController extends Controller
{
    public function index()
    {
        return view('dealer.index');
    }

    public function create()
    {
        return view('seller.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $dealer = new Dealer();
        $dealer->name = $request->name;
        $dealer->address = $request->address;
        $dealer->phone = $request->phone;
        $dealer->email = $request->email;
        $dealer->save();

        return redirect()->route('dealer.index');
    }

    public function edit($id)
    {
        $dealer = Dealer::find($id);
        return view('dealer.edit', compact('dealer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $dealer = Dealer::find($id);
        $dealer->name = $request->name;
        $dealer->address = $request->address;
        $dealer->phone = $request->phone;
        $dealer->email = $request->email;
        // set the user_id to the user id in the request
        $dealer->user()->associate($request->user_id);
        
        $dealer->save();

        return redirect()->route('dealer.index');
    }

    public function destroy($id)
    {
        $dealer = Dealer::find($id);
        $dealer->delete();

        return redirect()->route('dealer.index');
    }
}
