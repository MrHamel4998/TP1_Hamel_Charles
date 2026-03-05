<?php

namespace App\Http\Controllers;

use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Support\Facades\DB;
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

public function calculatePopularity($id)
{
    try {
        $rentalCount = DB::table('rentals')->where('equipment_id', $id)->count();
        $averageReview = DB::table('reviews')->where('equipment_id', $id)->avg('rating');

        if ($averageReview === null) {
            $averageReview = 0;
        }

        $popularity = ($rentalCount * 0.6) + ($averageReview * 0.4);

        return response()->json([
            'popularity' => $popularity
        ], 200);

    } catch (ModelNotFoundException $ex) {
        abort(404, 'EquipmentController/ID Not Found');
    } catch (Exception $ex) {
        abort(500, 'EquipmentController/Server Error');
    }
}

// Utilisation de ChatGPT:
// Prompt : Comment on fait pour savoir si une date à un format valide en php
// ChatGPT : Pour transformer une chaîne de caractères représentant une date en valeur exploitable en PHP, on utilise strtotime(). 
//           strtotime() sert à convertir une date texte en timestamp, si la conversion échoue, il retourne false..
    public function calculateAverageRentalPrice(Request $request, $id) {
        try 
        {
            $minDate = $request->query('minDate');
            $maxDate = $request->query('maxDate');

            if ($minDate != null && !strtotime($minDate)) {
                return response()->json(['message' => 'Format minDate invalide'], 422);
            }

            if ($maxDate != null && !strtotime($maxDate)) {
                return response()->json(['message' => 'Format maxDate invalide'], 422);
            }

            if ($minDate && $maxDate && strtotime($minDate) > strtotime($maxDate)) {
                return response()->json([
                    'message' => 'minDate doit être inférieur à maxDate.'
                ], 422);
            }

            $query = DB::table('rentals')->where('equipment_id', $id);

            if ($minDate != null) {
                $query->whereDate('start_date', '>=', $minDate);
            }

            if ($maxDate != null) {
                $query->whereDate('end_date', '<=', $maxDate);
            }

            $average = $query->avg('total_price');
            return response()->json([
                'average_total_price' => $average ?? 0
            ], 200);

        } catch (ModelNotFoundException $ex) {
            abort(404, 'EquipmentController/ID Not Found');
        } catch (Exception $ex) {
            abort(500, 'EquipmentController/Server Error');
        }
    }

}
