<?php

namespace App\Services;

use App\Models\Data;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class DataService
{
    public function index(string $status): LengthAwarePaginator
    {
        return Data::where('status', $status)
            ->where('user_id', Auth::id())
            ->paginate(10);
    }

    public function move(Data $data, string $status): bool
    {
        return $data->update([
            'status' => $status,
        ]);
    }

    public function store(array $data): Data
    {
        return Data::create([
            ...$data,
            "user_id" => Auth::id()
        ]);
    }

    public function update(array $data, Data $model): bool
    {
        return $model->update($data);
    }

    public function destroy(Data $data): bool
    {
        return $data->delete();
    }
}
