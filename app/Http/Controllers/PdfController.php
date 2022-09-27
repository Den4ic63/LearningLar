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

//        $path=$request->file('image')->store('app/public','public');
        $image=$request->file('image');
        Image::make($image)->resize(null, 200, function ($constraint){$constraint->aspectRatio();});
        $image->store('app/public','public');

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
