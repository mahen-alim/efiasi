<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{
    public function getData()
    {
        $user = User::all();

        return response()->json([
            'success' => $user
        ], 200);
    }

    public function postData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users, email',
            'password' => 'required',
            'mobile_phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'mobile_phone' => $request->input('mobile_phone'),
        ]);


        return response()->json([
            'success' => $user,
            'message' => 'Data user berhasil disimpan'
        ], 200);
    }

    public function updateData(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|min:5',
            'email' => 'email|min:10|unique:users,email,' . $id,
            'password' => 'string|min:10',
            'mobile_phone' => 'integer|min:10|max:13',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->mobile_phone = $request->input('mobile_phone');
        $user->save();

        return response()->json(['data' => $user, 'message' =>'Data user berhasil dirubah'], 200);
    }


    public function deleteData($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Data user tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Data user berhasil dihapus'], 200);
    }
}
