<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\ResumeUpload;
use Illuminate\Support\Facades\Log;
use App\Models\Candidate;
use App\Services\ResumeParserService;

class ParseResumeJob implements ShouldQueue
{
    use Queueable;

    public $filename;
    public $uploadId;
    public function __construct($filename, $uploadId)
    {
        $this->filename = $filename;
        $this->uploadId = $uploadId;
    }

    public function handle(): void
    {
        try {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile(storage_path('app/private/' . $this->filename));
            $text = $pdf->getText();

            $data = ResumeParserService::parse($text);


            Candidate::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'skills' => $data['skills'],
                // 'score' => $score,
                'resume_upload_id' => $this->uploadId,
            ]);

            ResumeUpload::find($this->uploadId)->update(['status' => 'success']);
        }
        catch (\Exception $e) {
            Log::error('Resume parsing failed: ' . $e->getMessage());
            ResumeUpload::find($this->uploadId)->update(['status' => 'failed']);
        }
    }
}
