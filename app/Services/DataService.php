<?php

namespace App\Services;

use App\Models\Data;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataService
{
    public function getDataCount(): array
    {
        $sheet = config("sheets");
        $count = [];

        foreach ($sheet as $key => $value) {
            $count[$key] = Data::where('status', $key)
                ->count();
        }

        return $count;
    }
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

    public function deleteFile(Data $data, $fileToDelete, array $files, string $field): bool
    {
        if (($key = array_search($fileToDelete, $files)) !== false) {
            unset($files[$key]);
            Storage::disk('public')->delete($fileToDelete);

            $data->$field = json_encode(array_values($files));
            $data->save();

            return true;
        }
        return false;
    }
    public function destroy(Data $data): bool
    {
        return $data->delete();
    }
}
