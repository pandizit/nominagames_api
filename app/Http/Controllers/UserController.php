<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\UserHobbyModel;

class UserController extends Controller
{
    public function add()
    {
        $input = request()->all();
        $input['password'] = md5(sha1($input['password']));
        $userModel = UserModel::create($input);
        $newid = $userModel->id;

        $hobbys = json_decode($input['hobby']);
        foreach($hobbys as $hoby)
        {
            if($hoby->checked=='true')
            {
                $data = array
                (
                    'iduser' => $newid,
                    'idhobby' => $hoby->id
                ); 
                UserHobbyModel::create($data);
            }
        }

        $data = array
        (
            'status' => 1,
            'message' => 'Pembuatan User Berhasil !',
            'user' => $userModel
        );

        return response()->json($data);
    }

    public function edit()
    {
        $input = request()->all();

        UserModel::find($input['id'])->update($input);
        $hobbys = json_decode($input['hobby']);

        UserHobbyModel::where('iduser', $input['id'])->delete();
        foreach($hobbys as $hobby)
        {
            if($hobby->checked=='true')
            {
                $data = array
                (
                    'iduser' => $input['id'],
                    'idhobby' => $hobby->id
                );
                UserHobbyModel::create($data);
            }
        }

        $data2 = array
        (
            'status' => 1,
            'message' => 'Update User Berhasil !'
        );
        
        return response()->json($data2);
    }

    public function hobby($id)
    {
        $userHobbyModel = UserHobbyModel::where('iduser', $id)->get();
        return response()->json($userHobbyModel);
    }

    public function info($id)
    {
        $userModel = UserModel::find($id);
        return response()->json($userModel);
    }

    public function list()
    {
        $userModel = UserModel::get();
        return response()->json($userModel);
    }

    public function login()
    {
        $input = request()->all();

        $userModel = UserModel::where('email', $input['email'])->where('password', md5(sha1($input['password'])))->first();
        if($userModel==null)
        {
            $data = array
            (
                'status' => 0,
                'message' => 'Email atau Password Salah !'
            );
        } else {
            $data = array
            (
                'status' => 1,
                'message' => 'Login Berhasil !',
                'user' => $userModel
            );
        }

        return response()->json($data);
    }

    public function register()
    {
        $input = request()->all();
        $input['password'] = md5(sha1($input['password']));

        $userModel = UserModel::create($input);
        $data = array
        (
            'status' => 1,
            'message' => 'Pembuatan User Berhasil !',
            'user' => $userModel
        );

        return response()->json($data);
    }
}
