<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentalClassRequest;
use App\Models\Vehicles\RentalClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RentalClassController extends Controller
{
    public function index(): View
    {
        $rentalClasses = RentalClass::paginate(20);
        return \view('dashboard.vehicles.rental_classes.index',compact('rentalClasses'));
    }

    public function create(): View
    {
        return view('dashboard.vehicles.rental_classes.create');
    }

    public function store(RentalClassRequest $request): RedirectResponse
    {
        RentalClass::create($request->validated());
        return redirect('/rental-classes')->with('success','Rental Class Created');
    }

    public function show(int $id): View
    {
        $rentalClass = RentalClass::findOrFail($id);
        return view('dashboard.vehicles.rental_classes.show',compact('rentalClass'));
    }

    public function edit(int $id): View
    {
        $rentalClass = RentalClass::findOrFail($id);
        return view('dashboard.vehicles.rental_classes.edit',compact('rentalClass'));
    }

    public function update(RentalClassRequest $request, int $id): RedirectResponse
    {
        RentalClass::findOrFail($id)->update($request->validated());
        return redirect('/rental-classes')->with('success','Rental Class Updated');
    }

    public function destroy(int $id): RedirectResponse
    {
        RentalClass::findOrFail($id)->delete();
        return redirect('/rental-classes')->with('success','Rental Class Deleted');
    }


}
