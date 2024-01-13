<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Mime\Part\File;

class EmployeeController extends Controller
{
    public function insertEmployee(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'FristName' => 'required|string',
            'LastName' => 'required|string',
            'Adress' => 'required|string',
            'City' => 'required|string',
            'images' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the file types and size as needed
        ]);

        // Handle file upload
        $img_url = null; // Initialize the variable to handle the case when no file is uploaded

        if ($request->hasFile('images')) {
            // Prepare File Name & Path
            $img = $request->file('images');

            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";

            // Upload File
            $img->move(public_path('uploads'), $img_name);
        }

        // Create or update the employee record
        Employee::create([
            'FristName' => $request->input('FristName'),
            'LastName' => $request->input('LastName'),
            'Adress' => $request->input('Adress'),
            'City' => $request->input('City'),
            'images' => $img_url,
        ]);

        // You might want to return a response or redirect here based on your application logic
        return response()->json(['message' => 'Employee created successfully']);
    }

    public function listEmployee()
    {
        $allEmployee = Employee::all();
        return view('all_view', compact('allEmployee'));
    }
    public function updateEmployeepage()
    {
        return view('update',);
    }
    public function updateEmployee(Request $request)
    {
        $allEmployeeid = $request->id;
        if ($request->hasFile('update_images')) {

            // Upload New File
            $img = $request->file('update_images');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$allEmployeeid}-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'), $img_name);

            // Delete Old File
            // $filePath = $request->input('file_path');
            // File::delete($filePath);

            // Update Product

            return Employee::where('id', $allEmployeeid)->update([
                'FristName' => $request->input('update_FristName'),
                'LastName' => $request->input('update_LastName'),
                'Adress' => $request->input('update_Adress'),
                'images' => $img_url,
                'City' => $request->input('update_City'),
            ]);
        } else {
            return Employee::where('id', $allEmployeeid)->update([
                'FristName' => $request->input('name'),
                'LastName' => $request->input('price'),
                'Adress' => $request->input('unit'),
                'City' => $request->input('categories_id'),
            ]);
        }
    }

    public function deleteEmployee(Request $request)
    {
        $id = $request->id;
        Employee::where('id', $id)->delete();
        return redirect()->back();
    }
}
