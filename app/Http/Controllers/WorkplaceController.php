<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workplace\WorkplaceRequest;
use App\Http\Resources\Workplace\WorkplaceResource;
use App\Models\Workplace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class WorkplaceController extends Controller
{
    public function index(): InertiaResponse
    {
        $workplaces = WorkplaceResource::collection(Workplace::query()->paginate(20));

        return Inertia::render('workplace/index', ['workplaces' => $workplaces]);
    }

    public function store(WorkplaceRequest $request): RedirectResponse
    {
        Workplace::query()->create($request->validated());

        return back();

    }

    public function update(WorkplaceRequest $request, Workplace $workplace): RedirectResponse
    {
        $workplace->update($request->validated());

        return back();
    }

    public function destroy(Workplace $workplace): RedirectResponse
    {
        $workplace->delete();

        return back();
    }
}
