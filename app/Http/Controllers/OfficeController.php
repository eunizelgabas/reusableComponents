<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\User;

class OfficeController extends Controller
{
    public function index() {
        $offices = Office::orderBy('name')
        ->with('user')->get();
        return inertia('offices/Index',compact('offices'));
    }

    public function create() {

        return inertia('offices/Create',[
            'offices' =>Office::orderBy('name')->with('user')->get(),
            'users' =>User::orderBy('fullname')->get()
        ]);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'name'=>'required',
            'building'=>'required',
            'user_id'=>'numeric|required',
        ]);

        Office::create($fields);

        return redirect('/offices')->with('message', 'Office Created Successfully');
    }

    public function edit(Office $office){
        return inertia('offices.Edit',[
            'office' => $office,
            'users' => User::orderBy('fullname')->get(),
            'message' => "You have successfully updated office $office->name"
        ]);
    }

    public function update(Request $request, Office $office){
        $fields = $request->validate([
            'name'=>'required',
            'building'=>'required',
            'user_id'=>'numeric|required',
        ]);

        $office->update($fields);

        return redirect('/offices')->with('success', "You successfully updated the office $office->name");
    }

    public function destroy(Office $office){

        $itemCount = $office->items()->count();

        if ($itemCount > 0) {
            return back()->withErrors(['GeneralErrors' => "You cannot delete the office $office->name because it has $itemCount items."]);
        }

        $office->delete();

        return redirect('/offices')->with('message', 'Office Deleted Successfully');
    }
}
