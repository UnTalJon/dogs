<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        return PersonResource::collection(Person::all());
    }

    public function store(PersonRequest $request)
    {
        return new PersonResource(Person::create($request->validated()));
    }

    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->validated());

        return new PersonResource($person);
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json();
    }
}
