<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEngineRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Package;
use App\Models\Engine;
use App\Models\Component;

use Session;
use Illuminate\Http\Request;

class EnginesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = carModel::find(Session::get('model'));
        $brands = Brand::find(Session::get('brand'));
        $package = Package::find(Session::get('package'));
        $components = Component::all();
        return view('admin.engines.create', compact('model', 'brands', 'package', 'components'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEngineRequest $request)
    {
        $results = $request->get('components');

        $engine = new Engine;
        $engine->package_id = Session::get('package')->id;
        $engine->type = $request->engine;
        $engine->save();

        $engine->components()->saveMany(Component::whereIn('id', $results)->get());

        return redirect(route('brands.create'));
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
        //
    }
}
