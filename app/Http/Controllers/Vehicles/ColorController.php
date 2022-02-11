<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Requests\ColorRequest;
use App\Models\Manufacturer;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

abstract class ColorController extends \App\Http\Controllers\Controller
{
    private ColorType $type;
    private string $model;

    abstract protected function getModel(): string;

    abstract protected function getType(): ColorType;

    public function __construct()
    {
        $this->type = $this->getType();
        $this->model = $this->getModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $colors = $this->model::with('manufacturer')->paginate(20);
        $type = $this->type->value;
        return view('dashboard.vehicles.colors.index', compact('colors', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $manufacturers = Manufacturer::all();
        $type = $this->type->value;
        return view('dashboard.vehicles.colors.create', compact('manufacturers', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ColorRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ColorRequest $request): RedirectResponse
    {
        $this->model::create($request->validated());
        return redirect("/{$this->type->value}-colors")->with('success', "{$this->type->name} Color Created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(int $id): View
    {
        $color = $this->model::with('manufacturer','yearModels')->findOrFail($id);
        $type = $this->type->value;
        return view('dashboard.vehicles.colors.show', compact('color', 'type'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit($id): View
    {
        $manufacturers = Manufacturer::all();
        $type = $this->type->value;
        $color = $this->model::findOrFail($id);
        return view('dashboard.vehicles.colors.edit', compact('manufacturers', 'color', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ColorRequest $request
     * @param int                             $id
     *
     * @return RedirectResponse
     */
    public function update(ColorRequest $request, $id): RedirectResponse
    {
        $this->model::findOrFail($id)->update($request->validated());
        return redirect("/{$this->type->value}-colors")->with('success', "{$this->type->name} Color Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $this->model::findOrFail($id)->delete();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return redirect('/models')->with('error', 'Model still has Vehicles, Exterior Colors or Interior Colors associated with it. You must delete those Items before you can delete the model');
            }
            throw $e;
        }
        return redirect("/{$this->type->value}-colors")->with('success', "{$this->type->name} Color Deleted");
    }
}
