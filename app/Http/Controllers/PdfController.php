<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\Facades\Image;

class PdfController extends Controller
{
    public function view_pdf()
    {
        return view('add-pdf');
    }

    public function CreatePdf(Request $request)
    {
        // resize the image to a height of 200 and constrain aspect ratio (auto width)

        $image=$request->file('image');
        $extension = 'jpg';
        $filename = uniqid() . '.' . $extension;
        Image::make($image)->resize(null, 200, function ($constraint){$constraint->aspectRatio();})->save(storage_path('app/public/app/public/'.$filename));
        $data = [
            'Name_file' => $request->name_file,
            'name' =>$request->name,
            'date'=>$request->date,
            'Country'=>$request->Country,
            'city'=>$request->city,
            'file'=>$filename
        ];

        $pdf = PDF::loadView('pdf', $data);

        return $pdf->download('pdf_f.pdf');
    }
}
