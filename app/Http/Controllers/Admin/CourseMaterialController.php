<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    public function create()
    {
        return view('admin.upload-material');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',

        'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,mp4,mov,avi,mkv|max:51200'
    ]);

    $path = $request->file('file')->store('materials', 'public');

    CourseMaterial::create([
        'title' => $request->title,
        'file' => $path,
        'course_id' => $request->course_id
    ]);

    return back()->with('success', 'Material uploaded successfully');
}

public function destroy($id)
{
    $material = CourseMaterial::findOrFail($id);

    if (\Storage::disk('public')->exists($material->file)) {
        \Storage::disk('public')->delete($material->file);
    }

    $material->delete();

    return back()->with('success', 'Material deleted successfully');
}


public function index()
{
    $materials = CourseMaterial::latest()->get();

    return view('admin.materials', compact('materials'));
}
//    public function store(Request $request)
  //  {
    //    $request->validate([
      //      'title' => 'required|string|max:255',
        //    'file' => 'required|file',
          //  'course_id' => 'nullable|exists:courses,id'
       // ]);

        // Hifadhi file kwenye storage/app/public/materials
        //$path = $request->file('file')->store('materials', 'public');

        //CourseMaterial::create([
          //  'title' => $request->title,
           // 'file' => $path,
           // 'course_id' => $request->course_id
       // ]);

       // return back()->with('success', 'Material uploaded successfully');
   // }
}
