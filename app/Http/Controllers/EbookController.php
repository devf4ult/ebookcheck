<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebooks;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ebooks::paginate(3);
        return view('ebooks_index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ebooks_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'file' => 'required|file|mimes:pdf|max:222048',
            'name' => 'required|unique:ebooks'
        ]);
 
        $file = $request->file('file');
 
        $filename = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $destination = 'files';
        $file->move($destination,$filename);
 
        $data = Ebooks::create([
            'name' => $request->name,
            'file' => $filename,
            'category' => $request->category,
        ]);

        return redirect()->route('ebooks.index')
                         ->with('success', 'Created successfully');
 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ebooks::destroy($id);
        return redirect()->back();
    }

    public function searchAdminVersion(Request $request) 
    {
        $keyword = $request->keyword;
        $data = Ebooks::where('name', 'LIKE', "%" .$keyword. "%")
                ->orWhere('category', 'LIKE', "%" .$keyword. "%")
                ->paginate(5);

        return view('ebooks_index', compact('data'));
    }

    public function search(Request $request) 
    {
        $keyword = $request->keyword;
        $data = Ebooks::where('name', 'LIKE', "%" .$keyword. "%")
                ->orWhere('category', 'LIKE', "%" .$keyword. "%")
                ->paginate(5);

        return view('welcome', compact('data'));
    }
}
