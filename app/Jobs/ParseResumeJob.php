<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\ResumeUpload;
use Illuminate\Support\Facades\Log;

class ParseResumeJob implements ShouldQueue
{
    use Queueable;

    public $filePath;
    public $uploadId;
    public function __construct($filePath, $uploadId)
    {
        $this->filePath = $filePath;
        $this->uploadId = $uploadId;
    }

    public function handle(): void
    {
        try {
            ResumeUpload::find($this->uploadId)->update(['status' => 'success']);
        }
        catch (\Exception $e) {
            Log::error('Resume parsing failed: ' . $e->getMessage());
            ResumeUpload::find($this->uploadId)->update(['status' => 'failed']);
        }
    }
}
