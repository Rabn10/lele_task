<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ResumeUpload;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ParseResumeJob;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $user = Auth()->user();
        if($user){
            return view('admin.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function create() {
        return view('admin.uploadCV');
    }

    public function uploadResumes(Request $request) {
        $request->validate([
            'resumes' => 'required',
            'resumes.*' => 'mimes:pdf|max:2048',
        ]);

        foreach ($request->file('resumes') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('resumes', $filename);

            $upload = ResumeUpload::create([
                'file_name' => $filename,
                'status' => 'pending',
            ]);

            // Dispatch the job to parse the resume
            ParseResumeJob::dispatch($filePath, $upload->id);
        }

        return redirect()->back()->with('success', 'Resumes uploaded successfully.');
    }
}
