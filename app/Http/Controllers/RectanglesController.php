<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Rectangle;

class RectanglesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rectangles = Rectangle::all();
        $rectangles = Rectangle::all();
        // Log::info($rectangles);
        return view('rectangles.index')->with('rectangles', $rectangles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'width' => 'required',
            'height' => 'required',
            'color' => 'required',
            'shadowColor' => 'required',
            'textColor' => 'required',
            'shadowBlur' => 'required'
        ]);

        // Create Rectangle
        $rectangle = new Rectangle;
        $rectangle->width = $request->input('width');
        $rectangle->height = $request->input('height');
        $rectangle->color = $request->input('color');
        $rectangle->shadowColor = $request->input('shadowColor');
        $rectangle->textColor = $request->input('textColor');
        $rectangle->shadowBlur = $request->input('shadowBlur');
        $rectangle->save();
        
        return redirect('/rectangles');
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
        $rectangle = Rectangle::find($id);
        if($request->has('width')) {
            $rectangle -> width = $request->input('width');
        }
        
        if($request->has('height')) {
            $rectangle -> height = $request->input('height');
        }
        
        if($request->has('color')) {
            $rectangle -> color = $request->input('color');
        }

        if($request->has('shadowColor')) {
            $rectangle -> shadowColor = $request->input('shadowColor');
        }

        if($request->has('textColor')) {
            $rectangle -> textColor = $request->input('textColor');
        }

        if($request->has('shadowBlur')) {
            $rectangle -> shadowBlur = $request->input('shadowBlur');
        }

        $rectangle ->save();
        return redirect('/rectangles')->with('success', 'Rectangle Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Log::info('calling delete with' . $id);
        $rectangle = Rectangle::find($id);
        $rectangle->delete();
        return redirect('/rectangles')->with('success', 'Rectangle Removed');
    }
}
