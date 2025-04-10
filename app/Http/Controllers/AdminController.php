<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ResumeUpload;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ParseResumeJob;
use Illuminate\Support\Facades\Storage;
use App\Models\Candidate;

class AdminController extends Controller
{
    public function index() {
        $user = Auth()->user();
        if($user){
            $candidates = Candidate::orderBy('score', 'desc')->get();
            return view('admin.index', compact('candidates'));
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
            // $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
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

    public function exportRankedCsv() {
        $candidates = Candidate::orderByDesc('score')->get();

        $filename = 'ranked_candidates.csv';
        $path = storage_path("app/{$filename}");

        $file = fopen($path, 'w');

        // Write CSV headers
        fputcsv($file, ['Name', 'Email', 'Skills', 'Score']);

        // Write each candidate row
        foreach ($candidates as $candidate) {
            fputcsv($file, [
                $candidate->name,
                $candidate->email,
                $candidate->skills,
                $candidate->score
            ]);
        }

        fclose($file);

        // Return the file as download
        return response()->download($path)->deleteFileAfterSend();
        }
}
