<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use hotelya\imagenes;
use Redirect;
use Illuminate\Support\Facades\Auth;

class imagenesController extends Controller
{
     public function __construct() {
        // $this->middleware('auth', ['only' => ['logout',"index"]]);
        $this->middleware('auth', ['except' => array('mostrarImagenes')]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        // $use=Auth::user();
        // dd($use->hoteles());
        $hotel=DB::table('hoteles')       
         ->join('users', 'users.id', '=', 'hoteles.user_id')
         ->select('hoteles.idhoteles')
         ->where('users.id','=',$id)
        ->get();
        $imagenes=DB::table('imagenes')
        ->join('hoteles', 'hoteles.idhoteles', '=', 'imagenes.id_hotel')
         ->join('users', 'users.id', '=', 'hoteles.user_id')
         ->select('imagenes.*','hoteles.idhoteles')
         ->where('users.id','=',$id)
        ->get();
       //dd($hotel);
        return view('imagenes.index', compact('imagenes','hotel'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagenes.create');
    }

    public function createWhitDatos($idhoteles)
    {
        
        $idhotel=$idhoteles;
        return view('imagenes.create',compact('idhotel'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->id_hotel);
      
      //
        try {
            //imagen
                    if ($request->hasFile('nombre')) {
                        $file=$request->file('nombre');
                        $name=time().$file->getClientOriginalName();
                        $file->move(public_path().'/imagenes/',$name);
                    }
                   
                    $post=imagenes::create([      
                        'nombre'=>$name,
                        'id_hotel'=>$request->id_hotel,
                      ]);
            
                      //para la imagen
                    //   if ($request->file('imagen')) {
                    //     $path=storage::disk('public')->put('imagenes',$request->file('imagen'));
                    //     $post->fill(['imagen'=>asset($path)])->save();
                    // }
                    
                    //dd($name);
                    //
                      return Redirect::to('/imagenes')->with('message', 'im&aacutegen registrada');
                     
                  } catch (\Throwable $th) {
                    return Redirect::to('/imagenes')->with('error', 'No se registro la im&aacutegen');
            
                  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen=imagenes::find($id);
        //dd($imagen);
        return view('imagenes.edit',compact("imagen"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        try {
            //imagen
           if ($request->hasFile('nombre')) {
               $file=$request->file('nombre');
               $name=time().$file->getClientOriginalName();
               $file->move(public_path().'/imagenes/',$name);
              
           }   
           $imagenes=imagenes::find($id); 
          
            $imagenes->nombre=$name;
           $imagenes->id_hotel=$request->input('id_hotel');          
           //dd($imagenes->id_hotel);
          
           $imagenes->save();
          
           return Redirect::to('/imagenes')->with('message', 'la im&aacuteagen fue editada correctamente');
           } catch (\Throwable $th) {
               return Redirect::to('/imagenes')->with('error', 'No se edito la im&aacutegen');
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mostrarImagenes($id)
    {
   
        $imagenes = DB::table('imagenes')
        ->join('hoteles', 'hoteles.idhoteles', '=', 'imagenes.id_hotel')
        ->select('imagenes.nombre')
        ->where('hoteles.idhoteles',$id)
        ->get();
     
       return view('imagenes.show',compact("imagenes"));
    }
}
