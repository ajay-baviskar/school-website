<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Carbon\Carbon;
use App\Models\Suggestion;
use App\Models\Plant;
use Mail;
use DateTime;

class WeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datas = Suggestion::all();
        $plant_data = Plant::all();
        $data = [];
        foreach ($datas as $datas_val) {
            $getSuggestionData = $datas_val->getSuggestionData;
            $data[]=[
                'Type'=>$datas_val->getType->name,
                'Title'=>$getSuggestionData->title,
                'Department'=>$datas_val->getDepartment->name,
                'Plant'=>$datas_val->getPlant->name,
                'Created By'=>$datas_val->getCreatedBy->name,
                'Status'=>$datas_val->status,
                'Due Date'=>$datas_val->due_date,
                'Target Date'=>$datas_val->target_date,
                'Completion Date'=>$datas_val->date_of_completion,
                'Description'=>$getSuggestionData->desc,
                'Priority'=>$getSuggestionData->priority,
                'Score'=>$datas_val->feedback_score,
                'Created Date'=>$datas_val->created_at,
            ];
        }
        foreach ($plant_data as $key => $value) {
            $value->total_ticket = $datas->where('plant_id',$value->id)->count();
            $value->open = $datas->where('plant_id',$value->id)->whereNotIn('status',['Approve','Closed'])->count();
            $value->assigned = $datas->where('plant_id',$value->id)->where('status','Approve')->count();
            $value->closed = $datas->where('plant_id',$value->id)->where('status','Closed')->count();
        }
        // echo "<pre>"; print_r($plant_data); echo "</pre>"; die('anil');    
        // ->whereBetween('created_at', [$request->start_date, $request->end_date]);
        $export = new SampleExport($data);
        $fileName = 'WeeklyReport_' . date('d_m_Y') . '.xlsx';
        $filePath = 'public/weekly-reports/' . $fileName; // Relative path within storage/app/public
        
        Excel::store($export, $filePath);
        $today = new DateTime(); // Get current date
        $today->setISODate($today->format('Y'), $today->format('W')); // Set to current ISO week

        $startDate = $today->format('Y-m-d'); // Start date of the current week (Monday)
        $endDate = $today->modify('+6 days')->format('Y-m-d'); // End date of the current week (Sunday)

        // Format the week number (1 for the 1st week of the month)
        $weekNumber = ceil((int)$startDate / 7);

        // Create the desired string
        $subject = "Weekly Report on Sahyoug Portal! - Week $startDate to $endDate";
        $filePath = storage_path('app/public/weekly-reports/' . $fileName);
        if (!file_exists($filePath)) {
            die("File not found: $filePath");
        }

        $mail = \Mail::send('mail.weekly_report_hod', compact('plant_data'), function($message) use ($plant_data, $subject, $filePath, $fileName) {
            // Add recipients
            $message->to(['itsanil1996@gmail.com', 'achal@sanchitsolutions.net']);
            
            // Attach the file
            $message->attach($filePath, [
                'as' => $fileName, // optional: specify attachment name
                'mime' => 'application/pdf', // adjust MIME type if needed
            ]);
            
            // Set email subject
            $message->subject($subject);
        });
        // echo "<pre>"; print_r($data); echo "</pre>"; die('anil');
        return 0;
    }

    
}

class SampleExport implements FromArray, WithHeadings, WithEvents
{
    use RegistersEventListeners;
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
                'Type',
                'Title',
                'Department',
                'Plant',
                'Created By',
                'Status',
                'Due Date',
                'Target Date',
                'Completion Date',
                'Description',
                'Priority',
                'Score',
                'Created Date',
            ];
    }

    
}
