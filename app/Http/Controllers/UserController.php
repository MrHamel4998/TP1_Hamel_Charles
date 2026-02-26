<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->validated());
            return (new UserResource($user))->response()->setStatusCode(201);
        } catch (QueryException $ex) {
            abort(422, 'UserController/Cannot be created');
        } catch (Exception $ex) {
            abort (500, 'UserController/Server error');
        }
    }

    public function update(StoreUserRequest $request, string $id)
    {
        try {
            $request = $request->validated();
            $user = User::findOrFail($id);
            return (new UserResource($user->update($request->all())))->response()->setStatusCode(200);
        } catch (ValidationException $ex) {
            abort (422, 'UserController/Failed validation');
        } catch (QueryException $ex) {
            abort (422, 'UserController/Cannot be updated in database');
        } catch (Exception $ex) {
            abort (500, 'UserController/Server error');        }
    }
}
