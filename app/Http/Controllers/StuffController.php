<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stuff;

class StuffController extends Controller
{
    public function index()
    {
        $stuff = Stuff::paginate(5);
        return view('stuffs.index',['stuff' => $stuff]);
    }

    public function show($id)
    {
        $stuff =  Stuff::find($id);
        return view('stuffs.show',['stuff' => $stuff]);
    }

    public function create()
    {
        return view('stuffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
        ]);
        
        $file = $request->file('file');
        $nama_file = time()."_";
        $tujuan = 'image';
        $file->move($tujuan,$nama_file);

        $stuff = Stuff::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $nama_file
        ]);
        return redirect('/stuffs')
            ->with('success','Stuff created successfully.');
    }

    public function delete($id)
    {
        $stuff = Stuff::find($id);
        $stuff->delete();
        return redirect('/stuffs')->with('success','Delete successfully.');
    }

    public function edit($id)
    {
        $stuff = Stuff::find($id);
        return view('stuffs.edit',['stuff' => $stuff]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
        ]);

        $stuff = Stuff::find($id);
        $stuff->name = $request->name;
        $stuff->price = $request->price;
        $stuff->category = $request->category;
        $stuff->stock = $request->stock;
        
        if($request->file('file')){
            $file = $request->file('file');
            $nama_file = time()."_";
            $tujuan = 'image';
            $file->move($tujuan,$nama_file);
            $stuff->image = $nama_file;
        }else{
            $stuff->image = $request->image;
        }


        $stuff->save();

        return redirect('/stuffs')->with('success','Update successfully.');
    }
}
