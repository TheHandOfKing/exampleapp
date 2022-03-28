<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCarRequest;
use App\Models\CarModel;
use App\Models\Manufacturer;
use App\Models\SavedCar;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $manufacturer = Manufacturer::findOrFail($request->id);

            return $manufacturer->carModels;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $carModel)
    {
        //
    }

    public function saveCarToUser(SaveCarRequest $request)
    {
        $car = SavedCar::where('user_id', auth()->user()->id)->where('car_model_id', $request->car_model)->get();

        if (count($car) > 0) {
            return redirect()->route('cars.saved')->with('notice', 'That car is alerady saved');
        }

        SavedCar::insert([
            [
                'user_id' => auth()->user()->id,
                'car_model_id' => $request->car_model
            ]
        ]);

        return redirect()->route('cars.saved')->with('success', 'Car saved');
    }

    public function unsaveCarFromUser($id)
    {
        $rel = SavedCar::where('user_id', auth()->user()->id)->where('car_model_id', $id);
        $rel->delete();

        return redirect()->route('cars.saved')->with('error', 'Car unsaved');;
    }
}
