<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

            return Redirect::route('home')->with('success', 'Revista criada com sucesso.');
        }        
        
        return view('revista.create');
    }


    public function list() 
    {        
        $revistas = Revista::all()->sortByDesc('edicao');

        if(isset( $revistas) && !empty($revistas)) {
            $indice = 0;
            foreach($revistas as $revista) {
                $revista->indice = $indice + 1;
                $indice++;
            }
        }       

        return view('revista.list', [
            'revistas' => $revistas             
        ]);
    }
  
    public function viewer($id)
    {                
        return view('revista.viewer', [
            'revistaUrl' => Storage::url(Revista::find($id)->pdf)
        ]);
    }

    public function delete(Revista $revista)
    {
        try {
            Storage::disk('public')->delete([
                $revista->thumbnail, 
                $revista->pdf
            ]);
            $revista->delete();            
            return Redirect::route('home')->with('success', 'Revista removida com sucesso.');

        } catch(Exception $ex) {
            return Redirect::back()->with('danger', $ex->getMessage());
        }
    }
}
