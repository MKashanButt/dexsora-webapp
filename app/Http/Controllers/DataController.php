<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Services\DataService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->with('success', 'Data Moved to ' . ucwords(str_replace('-', ' ', $status)));
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

        if ($request->hasFile($queryParams)) {
            $storedFiles = [];

            foreach ($request->file($queryParams) as $file) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs("uploads/{$queryParams}", $originalName, 'public');
                $storedFiles[] = $path;
            }

            $existing = $data->$queryParams ?? [];
            $existing = is_array($existing) ? $existing : json_decode($existing, true);
            $merged = array_merge($existing ?? [], $storedFiles);

            $this->dataService->update([
                $queryParams => json_encode($merged),
            ], $data);

            return redirect()->back()->with('success', ucfirst($queryParams) . ' uploaded.');
        }

        $this->dataService->update([
            $queryParams => $input
        ], $data);

        return redirect()
            ->back()
            ->with('success', ucwords($queryParams) . ' Added');
    }
    public function deleteFile(Request $request, Data $data, $field)
    {
        $fileToDelete = $request->input('file');

        $files = json_decode($data->$field, true) ?? [];

        if ($this->dataService->deleteFile($data, $fileToDelete, $files, $field)) {
            return redirect()->back()->with('success', 'File deleted.');
        }

        return redirect()->back()->with('error', 'An error occured.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
