<?php

namespace App\Http\Controllers\api;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use App\Http\Requests\CreateKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    public function create(CreateKelasRequest $request)
    {
        // Validate Request
        $request->validated();

        // Insert Data
        $res = Kelas::create([
            'nama' => $request->nama
        ]);

        // Return Response
        return new KelasResource($res, 200, "success", "Create Data Success");
    }

    public function get(Request $request)
    {
        // Ambil Search key
        $searchKey = $request->query('search') ?? "";

        // Ambil Data
        $data = Kelas::where('nama', 'LIKE', '%' . $searchKey . '%')
            ->paginate(10);


        // Return Response Json
        return new KelasResource($data, 200, "success", "Data Kelas");
    }

    public function update(UpdateKelasRequest $request, $id)
    {
        // Validate Request
        $request->validated();


        // Check User ID
        $oldDataKelas = Kelas::where('id', $id);
        if (!$oldDataKelas->first()) {
            return response()->json(['statusCode' => 404, 'status' => "error", "message" => "Data Kelas With ID=$id Not Found "], 404);
        }


        // Action Update
        $oldDataKelas->update($request->all());

        // Return Response
        return new KelasResource(Kelas::where('id', $id)->first(), 200, "success", "Success Update Data kelas With ID=$id");
    }

    public function delete($id)
    {
        // Check ID
        $data = Kelas::where('id', $id);
        if ($data->get()->isEmpty()) {
            return response()->json(['statusCode' => 404, 'status' => 'error', 'message' => "Data Kelas Not Found!"], 404);
        }

        // Delete Data Kelas
        $data->delete();

        // Return Response
        return response()->json(['statusCode' => 200, 'status' => "success", "message" => "Data Kelas With ID=$id Success Deleted"], 200);
    }

    public function getDetail($id)
    {
        // Check Users
        $data = Kelas::where('id', $id)->first();

        if (!$data) {
            return response()->json(['statusCode' => 404, 'status' => 'error', 'message' => 'Data users Not Found!'], 404);
        }

        // Return Response
        return new KelasResource($data, 200, "success", "Data Detail Kelas with ID=$id");
    }
}
