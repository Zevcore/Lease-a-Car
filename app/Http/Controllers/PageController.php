<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CarModel;
use App\Models\Brand;

class PageController extends Controller
{
    public function welcome() {
        return view('index');
    }
    public function admin() {
        return view('admin.index');
    }

    /* @foreach ($brands as $brand)
        <ul class='list-group'>
          <h3>{{$brand->name}} ({{$brand->id}})</h3>
          @foreach($brand->carModels as $car)
            <li class="list-group-item d-flex justify-content-between align-items-center" >{{$car->name}}
                <span class="badge badge-primary badge-pill">{{$car->id}}</span></li>
          @endforeach
        </ul>
      @endforeach */
}
