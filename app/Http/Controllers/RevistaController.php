<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            // TODO: TO Validate the request            
            
            $input = $request->all();      
            $thumbnail = $request->file('thumbnail');
            $pdf =  $request->file('pdf');            

            $pathThumb = $thumbnail->store('thumbnail', 'public');
            $pathPdf = $pdf->store('revista', 'public');           
            
            $revista = Revista::create([
                'edicao' => $request->input('edicao'),
                'descricao' => $request->input('descricao'),
                'thumbnail' => $pathThumb,
                'pdf' => $pathPdf                      
            ]);

            return view('revista.create', [
                'revista' => $revista
            ]);
        }        
        
        return view('revista.create');
    }

  
    public function viewer($id)
    {                
        return view('revista.viewer', [
            'revistaUrl' => Storage::url(Revista::find($id)->pdf)
        ]);
    }

    public function update() 
    {
        //TODO
        //Create update method        
        
    }

    public function delete(Revista $revista)
    {

    }
}
