<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Brand;
use App\Models\Package;
use App\Models\Engine;

use Session;
use Validator;

class SearchController extends Controller
{
    public function search(Request $request) {
        $this->validate($request, [
            'search' => 'required'
            ]);

        $query = $request->search;
        $packages = Package::with('carModels')
            ->where('price', '<=', $query)
            ->get();


        /*$results = CarModel::with('brand')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere(function ($nq) use ($query) {
                return $nq->whereHas('brand', function($q) use ($query) {
                    return $q->where('name', 'LIKE', '%' . $query . '%');
                });
            })
            ->get();*/



        /*$packages = Package::where('model_id', '=', $model->id);
        dd($packages);*/

        if(count($packages) < 1) {
            return view('index')->with('error', 'No cars with the given criteria :C');
        }
        else{
            return view('cars', compact('packages', 'models'));
        }
    }

    public function package(Request $request)
    {
        $engines = Engine::all()->where('package_id', '=', $request->identy);
        dd($engines);
        return view('package')->with('engines', $engines);
    }

    public function equipment(Request $request) {
        $package = Package::find($request->package);
        $engines = Engine::all()->where('package_id', '=', $request->package);
        return view('equipment', compact('package', 'engines'));
    }

    public function component(Request $request) {
        $engine = Engine::find($request->engine);
        $components = $engine->components;

        return view('components', compact('engine', 'components'));
    }

    public function lease(Request $request) {
        $price = $request->price;
        $contribution = $request->contribution;
        $months = $request->months;

        $result = ($price-$contribution)/$months;
        echo "Monthly installment: ".$result;
        echo "<br><a href='/'>Go back</a>";
    }

}
