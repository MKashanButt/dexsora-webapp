<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Services\DataService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    private DataService $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $status): View
    {
        $data = $this->dataService->index($status);

        return view("render", compact("data"));
    }

    public function move(Request $request, Data $data): RedirectResponse
    {
        $status = $request->query("status");
        $this->dataService->move($data, $status);

        return redirect()
            ->back()
            ->with('success', 'Data Moved to ' . $status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        $queryParams = $request->query('field');
        $input = $request->input($queryParams);

        if (in_array($queryParams, ['document', 'pod'])) {
            if ($request->hasFile($queryParams)) {
                $file = $request->file($queryParams);
                $path = $file->store("uploads/{$queryParams}", 'public');

                $this->dataService->update([$queryParams => $path], $data);

                return redirect()
                    ->back()
                    ->with('success', ucfirst($queryParams) . ' uploaded successfully.');
            }

            return redirect()
                ->back()
                ->withErrors([$queryParams => ucfirst($queryParams) . ' file is required.']);
        }

        $this->dataService->update([
            $queryParams => $input
        ], $data);

        return redirect()
            ->back()
            ->with('success', ucwords($queryParams) . ' Added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
