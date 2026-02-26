<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ReviewController extends Controller
{
    public function destroy(string $id) {
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            return response()->noContent(204);
        } catch ( ModelNotFoundException $ex) {
            abort (404, 'ReviewController/Id not Found');
        } catch (QueryException $ex) {
            abort (500, 'ReviewController/Database error');
        } catch (Exception $ex) {
            abort (500, 'ReviewController/Server error');
        }
    }
}
