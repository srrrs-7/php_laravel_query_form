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
            $student = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => sprintf("user %s not found", $id)
            ], 404);
        }
    }

    public function updateUser(Request $request, $id) {
        if (User::where('id', $id)->exists()) {
            $student = User::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();
    
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
            $student = User::find($id);
            $student->delete();

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
