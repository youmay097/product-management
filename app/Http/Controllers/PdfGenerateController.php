<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use PDF;
use Excel;
class PdfGenerateController extends Controller
{
     public function pdfview(Request $request)
    {
        $users = DB::table("users")->get();
		//dd($users);
        view()->share('users',$users);

        if($request->has('download')){
        	// Set extra option
        	//PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
			//PDF::setOptions(['dpi' => 150, 'defaultFont' => 'KHMERMEF1']);
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
	
	/*public function downloadExcel($type)

	{
		$users = User::select('id', 'name', 'email', 'created_at')->get();
		Excel::create('users', function($excel) use($users) {
			$excel->sheet('Sheet 1', function($sheet) use($users) {
				$sheet->fromArray($users);
			});
		})->export('xls');
		

	}*/
}
