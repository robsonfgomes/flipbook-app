<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use Illuminate\Http\Request;

class RevistaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            // TODO: Validate the request
            
            $input = $request->all();      
            $thumbnail = $request->file('thumbnail');
            $pdf =  $request->file('pdf');            

            $pathThumb = $thumbnail->store('thumbnail', 'public');
            $pathPdf = $pdf->store('revista', 'public');           
            
            $revista = Revista::create([
                'edicao' => $request->input('edicao'),
                'descricao' => $request->input('descricao'),
                'thumbnail' => $pathThumb,
                'pdf' => $pathPdf,
                'publicado' => false                
            ]);

            return view('revista.create', [
                'revista' => $revista
            ]);
        }
        return view('revista.create');
    }
}
