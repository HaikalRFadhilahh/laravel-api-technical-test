<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Http\Controllers\Controller;
use App\Http\Resources\MataPelajaranResource;

class MataPelajaranController extends Controller
{
    public function get(Request $request)
    {
        // Get Search Query From Request
        $search = $request->query('search') ?? "";

        // Get Data
        $data = MataPelajaran::where('nama', 'LIKE', '%' . $search . '%')
            ->with('guru')
            ->paginate(10);

        // dd($data);
        // Return Response With Json Resource
        return new MataPelajaranResource($data, 200, 'success', 'Data Mata Pelajaran');
    }

    public function getDetail($id)
    {
        // Get Data
        $data = MataPelajaran::where('id', $id)->with('guru');

        // Check Data Mata Pelajaran
        if (!$data->first()) {
            return response()->json([
                'statusCode' => 404,
                'status' => 'error',
                'message' => 'Data Mata Pelajaran Not Found!'
            ], 404);
        }


        // Return Data
        return new MataPelajaranResource($data->first(), 200, 'success', 'Data Detail Users');
    }

    public function create() {}

    public function update() {}

    public function delete() {}
}
