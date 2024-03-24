<?php

namespace App\Http\Controllers;

use App\Models\Featuredblog;
use Illuminate\Http\Request;

class Featureupdate extends Controller
{
    //create function called index to return the view
    public function index()
    {
        //get all data
        $data = Featuredblog::all();
        return view('home', compact('data'));
    }
    public function update(Request $request)
    {
        $data = new Featuredblog;
        $image = $request->file;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('pos/', $imageName);

        $data->image = $imageName;
        $data->category = $request->category; // Corrected typo: $request->catgory to $request->category
        $data->date = $request->date;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->author = $request->author;

        $data->save();
        return redirect()->back()->with('message', 'Product added successfully!');
    }
}
