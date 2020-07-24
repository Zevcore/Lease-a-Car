<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CarModel;
use Session;

class BrandsController extends Controller
{
    /*public function select(Request $request) {
        $query = $request->brand;
        $brand = Brand::find($query);

        Session::put('brand', $brand);
        Session::save();


        Session::push('models.create', 'create');
        return redirect(route('models.create'))->with('brand', $brand);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.brands.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand;
        $brand->name = $request->input('brand');
        $brand->save();

        $brand = Brand::find($brand->id);
        Session::put('brand', $brand);
        Session::save();


        Session::push('models.create', 'create');

        return redirect(route('models.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
            foreach($brand->carModels as $car){
                echo $car->name."<br>";
            }
        echo "<a href='/'><- back</a>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit')->with('brand', $brand);
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
        $brand = Brand::find($id);
        $brand->name = $request->input('brand');
        $brand->update();

        return redirect(route('brands.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $models = CarModel::all()->where('brandId', '=', $brand->id);
        foreach($models as $model){
            $model->delete();
        }
        $brand->delete();

        return redirect(route('brands.index'))->with('success', 'Succesfull destroy!');
    }
}
