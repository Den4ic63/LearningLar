<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function view_pdf()
    {
        return view('add-pdf');
    }

    public function CreatePdf(Request $request)
    {
        $data = [
            'Name_file' => $request->name_file,
            'name' =>$request->name,
            'date'=>$request->date,
            'Country'=>$request->Country,
            'city'=>$request->city,

        ];


        $pdf = PDF::loadView('pdf', $data);

        return $pdf->download('pdf_f.pdf');
    }
}
