<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Spatie\PdfToText\Pdf;

class PDFController extends Controller
{
    public function extractText(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $text = (new Pdf())
        ->setPdf($file)
        ->text();
        echo "<pre>"; print_r($text); echo "</pre>"; die('anil');
        $parser = new Parser();
        $pdf = $parser->parseFile("C:/Users/Sunil/Downloads/Credit Card Statement sept oct 13.pdf");
        $text = $pdf->getText();
        echo "<pre>"; print_r($text); echo "</pre>";
        echo "<pre>"; print_r($file->getRealPath()); echo "</pre>";
         die('anil');
        return response()->json([
            'text' => $text,
        ]);
    }
}
