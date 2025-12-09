<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogResource;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->query('pageSize', 15);

        return DogResource::collection(Dog::paginate($pageSize));
    }

    public function show(Dog $dog)
    {
        return new DogResource($dog);
    }
}
