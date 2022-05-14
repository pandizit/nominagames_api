<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HobbyModel;

class HobbyController extends Controller
{
    public function add()
    {
        $input = request()->all();
        HobbyModel::create($input);
        $data = array
        (
            'status' => 1,
            'message' => 'Pembuatan Hobi baru Berhasil !'
        );

        return response()->json($data);
    }

    public function edit()
    {
        $input = request()->all();
        
        HobbyModel::find($input['id'])->update($input);
        $data = array
        (
            'status' => 1,
            'message' => 'Update Hobi Berhasil !'
        );

        return response()->json($data);
    }

    public function info($id)
    {
        $hobbyModel = HobbyModel::find($id);
        return response()->json($hobbyModel);
    }

    public function list()
    {
        $hobbyModel = HobbyModel::get();
        return response()->json($hobbyModel);
    }

    public function list_active()
    {
        $hobbyModel = HobbyModel::where('active', 'true')->get();
        return response()->json($hobbyModel);
    }
}
