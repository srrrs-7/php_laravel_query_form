<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
        public function createUser(Request $request) {
        // dd($request->all());

        $user = new User();
        $user->job = $request->input("job");
        $user->name = $request->input("name");
        $user->mail = $request->input("mail");
        $user->portfolio = $request->input("portfolio");
        $user->query = $request->input("query");
        $user->file1 = $request->input("file1");
        $user->file2 = $request->input("file2");
        $user->file3 = $request->input("file3");

        $user->save();

        return response()->json([
            "message" => "create user"
        ], 201);
    }

    public function getAllUsers() {
        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
    }

    public function getUser($id) {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => sprintf("user %s not found", $id)
            ], 404);
        }
    }

    public function updateUser(Request $request, $id) {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->job = is_null($request->input("job")) ? $user->job : $request->input("job");
            $user->name = is_null($request->input("name")) ? $user->name : $request->input("name");
            $user->mail = is_null($request->input("mail")) ? $user->mail : $request->input("mail");
            $user->portfolio = is_null($request->input("portfolio")) ? $user->portfolio : $request->input("portfolio");
            $user->query = is_null($request->input("query")) ? $user->query : $request->input("query");
            $user->file1 = is_null($request->input("file1")) ? $user->file1 : $request->input("file1");
            $user->file2 = is_null($request->input("file2")) ? $user->file2 : $request->input("file2");
            $user->file3 = is_null($request->input("file3")) ? $user->file3 : $request->input("file3");
            $user->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => sprintf("user %s not found", $id)
            ], 404);
        }
    }

    public function deleteUser($id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => sprintf("user %s not found", $id)
            ], 404);
        }
    }
}
