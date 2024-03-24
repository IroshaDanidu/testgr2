<?php

namespace App\Http\Controllers;

use App\Models\Featuredblog;
use App\Models\l;
use Illuminate\Http\Request;

class news extends Controller
{

    public function indexnew()
    {
        //get all data
        $ldata = l::all();
        $data = Featuredblog::all();

        return view('home', compact('ldata', 'data'));
    }
    public function index()
    {
        //get all data
        $ldata = l::all();
        $data = Featuredblog::all();

        return view('home', compact('ldata', 'data'));
    }
    public function update(Request $request)
    {
        $ldata = new l;
        $image = $request->file;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('latestpos/', $imageName);

        $ldata->image = $imageName;
        $ldata->category = $request->category; // Corrected typo: $request->catgory to $request->category
        $ldata->date = $request->date;
        $ldata->title = $request->title;
        $ldata->description = $request->description;
        $ldata->author = $request->author;

        $ldata->save();
        return redirect()->back()->with('message', 'Product added successfully!');
    }
}
