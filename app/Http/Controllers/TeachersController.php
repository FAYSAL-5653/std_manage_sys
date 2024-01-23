<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class TeachersController extends Controller
{
    public function teasherspage()
    {
        return (view('teachers'));
    }
    public function insertteacher(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'teacher_name' => 'required|string',
                'designation' => 'required|string',
                'phone' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the file types and size as needed
            ]);

            // Handle file upload
            $img_url = null; // Initialize the variable to handle the case when no file is uploaded

            if ($request->hasFile('image')) {
                // Prepare File Name & Path
                $img = $request->file('image');

                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$t}-{$file_name}";
                $img_url = "uploads/{$img_name}";

                // Upload File
                $img->move(public_path('uploads'), $img_name);
            }

            // Create or update the employee record
            teachers::create([
                'teacher_name' => $request->input('teacher_name'),
                'designation' => $request->input('designation'),
                'phone' => $request->input('phone'),
                'image' => $img_url,
            ]);

            // You might want to return a response or redirect here based on your application logic
            // return response()->json(['message' => 'Employee created successfully']);
            return redirect('/Teacher-list');
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ], 200);
        }
    }
    public function Teacherlist()
    {
        $allteachers = teachers::all();
        return view('table', compact('allteachers'));
    }
    public function upteapage(Request $request)
    {
        $teacherdata = teachers::find($request->id);
        // return  $teacherdata;
        return view('updateteacher', compact('teacherdata'));
    }
    public function updateTeacher(Request $request)
    {
        try {
            $teacherid = $request->id;

            if ($request->hasFile('update_image')) {
                // Upload New File
                $img = $request->file('update_image');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$teacherid}-{$t}-{$file_name}";
                $img_url = "uploads/{$img_name}";
                $img->move(public_path('uploads'), $img_name);

                // Delete Old File
                $get_old_img = teachers::find($teacherid);
                $filePath = $get_old_img->image;
                File::delete($filePath);

                // Update Teacher
                $result = teachers::where('id', $teacherid)->update([
                    'teacher_name' => $request->input('update_teacher_name'),
                    'designation' => $request->input('update_designation'),
                    'phone' => $request->input('update_phone'),
                    'image' => $img_url,
                ]);

                if ($result) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Teacher updated successfully.',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Failed to update teacher.',
                    ], 500);
                }
            } else {
                // Update Teacher without changing the image
                $result = teachers::where('id', $teacherid)->update([
                    'teacher_name' => $request->input('update_teacher_name'),
                    'designation' => $request->input('update_designation'),
                    'phone' => $request->input('update_phone'),
                ]);

                if ($result) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Teacher updated successfully.',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Failed to update teacher.',
                    ], 500);
                }
            }
            return redirect('/Teacher-list');
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong.',
            ], 500);
        }
    }

    public function deleteTeacher(Request $request)
    {
        try {
            $id = $request->id;
            // Delete Old File
            $old_img_url = teachers::find($id);
            $old_filePath = $old_img_url->image;
            File::delete($old_filePath);
            teachers::where('id', $id)->delete();

            return redirect()->back();
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ], 200);
        }
    }
}
