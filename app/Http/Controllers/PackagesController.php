<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Models\CarModel;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Component;
use Session;

class PackagesController extends Controller
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
        $components = Component::all();

        return view('admin.packages.create', compact('model', 'brands', 'components'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {

        $package = new Package;
        $package->model_id = Session::get('model');
        $package->name = $request->name;
        $package->price = $request->price;
        $package->save();

        Session::put('package', $package);
        Session::push('engines.create', 'create');
        return redirect(route('engines.create'));
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
