<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreModelRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandsWithModels = Brand::with('carModels')->get();
        return view('admin.models.index')->with('brandsWithModels', $brandsWithModels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Session::get('brand');
        return view('admin.models.create')->with('brand', $brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelRequest $request)
    {
        $model = new CarModel;
        $model->name = $request->model;
        $model->brand_id = $request->brand;
        $model->save();

        $model = $model->id;
        Session::put('model', $model);
        Session::save();

        Session::push('packages.create', 'create');
        return redirect(route('packages.create'));
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
        $model = CarModel::find($id);
        return view('admin.models.edit')->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rules() {
        return [
            'model' => 'required|min:3|max:64|unique:carModels,name'
        ];
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, rules());

        $model = CarModel::find($id);
        $model->name = $request->input('model');
        $model->update();


        return redirect(route('models.index'))->with('success', 'Model edited!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarModel::find($id)->delete();

        return redirect(route('models.index'))->with('success', 'Succesfull destroy!');
    }
}
