<?php

namespace App\Http\Controllers;

use App\Models\class_names;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception; // Make sure to include the Exception class

class ClassNamesController extends Controller
{
    public function classpage()
    {
        return (view('classname'));
    }
    public function insertClassname(Request $request)
    {
        try {
            class_names::create([
                'class_name' => $request->input('ClassName'),
            ]);
            return response()->json(['message' => 'Class name created successfully']);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ], 200);
        }
    }
}
