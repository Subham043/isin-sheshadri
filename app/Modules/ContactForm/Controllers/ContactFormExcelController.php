<?php

namespace App\Modules\ContactForm\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ContactForm\Exports\ContactFormExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactFormExcelController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list enquiries', ['only' => ['get']]);
    }

    public function get(){
        return Excel::download(new ContactFormExport, 'contact_form.xlsx');
    }

}