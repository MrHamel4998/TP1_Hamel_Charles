<?php

namespace App\Http\Controllers;

use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        try {
            return EquipmentResource::collection(
            Equipment::paginate()
            )->response()->setStatusCode(200);
        } catch (Exception $ex) {
            abort (500, 'EquipmentController/Server Error');
        }
    }

    public function show(string $id){
        try {
            return ( new EquipmentResource(
                Equipment::findOrFail($id))
                )->response()->setStatusCode(200);
        } catch (ModelNotFoundException $ex) {
            abort(404, 'EquipmentController/ID Not Found');
        } catch (Exception $ex) {
            abort (500, 'EquipmentController/Server Error');
        }
    }

    /* TODO
    public function calculatePopularity () {

    }
   
    // TODO
    public function calculateAverage() {

    } */

}
