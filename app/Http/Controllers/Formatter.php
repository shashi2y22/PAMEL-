<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Formatter extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function aggregateFiles(Request $request)
    {
        $dsName = $request->dsName;
        $caseTitle = $request->caseTitle;
        $sourceType = $request->sourceType;

        if ($sourceType == 'G Drive') {$path = public_path('files');
            if (\File::exists($path)) {
                \File::deleteDirectory($path);
            }
            $sheetID = $request->sheetID;
            $process = new Process(['sh', '../app/Http/Controllers/Scripts/getCSVfromSheetPublicURL.sh', $sheetID, 'Sheet1', str_replace(' ', '_', $dsName), str_replace(' ', '_', $caseTitle)]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            return $process->getOutput();

        } else if ($sourceType == 'Local System') {
            if ($request->hasfile('files')) {
                $path = public_path('files');
                if (\File::exists($path)) {
                    \File::deleteDirectory($path);
                }

                foreach ($request->file('files') as $index => $file) {
                    Log::info('File :: ' . ($index + 1) . ") " . json_encode($file));
                    $name = ($index + 1) . "." . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/files/', $name);
                }
            }

            $process = new Process(['python3', '../app/Http/Controllers/Scripts/xlsxtocsv.py', str_replace(' ', '_', $caseTitle)]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            Log::info('XLSX_TO_CSV_SCRIPT :: ' . json_encode($process->getOutput()));

            $process = new Process(['python3', '../app/Http/Controllers/Scripts/aggregate.py', $dsName, str_replace(' ', '_', $caseTitle)]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            return $process->getOutput();
        }
    }

}
