<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\EstadoProducto;
use App\Models\Favorito;
use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->rol->id_role == 2 &&  request()->path() == 'dashboard'){
            $productos = Producto::orderBy('fecha_publicacion','DESC')->where('id_estado_producto','!=',3)->get();
            return view('productos.tus-productos',[
                'productos' => $productos,
                'isAdmin' => Auth::user()->rol->id_role == 2,
            ]);
        }
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }

        if(request()->path() == 'dashboard/tus-productos'){
            $productos = Producto::orderBy('fecha_publicacion','DESC')->where('id_user','=',Auth::id())->where('id_estado_producto','!=',3)->get();
            return view('productos.tus-productos',[
                'productos' => $productos,
                'isAdmin' => Auth::user()->rol->id_role == 2,
            ]);
        }
        if(request()->path() == 'dashboard/favoritos'){
            $favoritos = Favorito::where('id_user','=',Auth::id())->get();
            // dd($favoritos[0]->producto()->get()->first()->nombre);
            return view('productos.favoritos',[
                'favoritos' => $favoritos
            ]);
        }
    
        if (!request('search')){
            $productosPopulares = Producto::orderBy('fecha_publicacion','DESC')->where('puntuacion','>','4')->limit(8)->get();
            $productosNovedosos = Producto::orderBy('fecha_publicacion','DESC')->get();    
        }else {
            $valorBuscado = request('search');
            // Si se realiza una busqueda
            $productosPopulares = Producto::orderBy('fecha_publicacion','DESC')->where('puntuacion','>','4')->where('nombre','LIKE',"%{$valorBuscado}%")->limit(8)->get();
            $productosNovedosos = Producto::orderBy('fecha_publicacion','DESC')->where('nombre','LIKE',"%{$valorBuscado}%")->get();
    
        }

        return view('dashboard',[
            'productosPopulares' => $productosPopulares,
            'productosNovedosos' => $productosNovedosos,
            'userId' => Auth::id(),
            
        ]);
        
        
        
        // dump($productosPopulares);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        $categorias = Categoria::orderBy('nombre','DESC')->get();
        $estadosProducto = EstadoProducto::all();
        // dd($estadosProducto);
        return view('productos.create',[
            'categorias' => $categorias,
            'estadosProducto' => $estadosProducto,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        // return $request;
        $producto = new Producto([
            'nombre' => $request->nombre,
            'id_user' => Auth::id(),
            'id_categoria' => $request->id_categoria,
            'id_estado_producto' => $request->id_estado_producto,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            // 'fecha_publicacion' => Carbon::now(),
        ]);
        $producto->save();
        // return $producto;
        # Hay imagenes?
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $fileName = $imagen->getClientOriginalName();
                
                // Guardar cada imagen en el directorio storage/app/carpeta_destino
                $ruta = $imagen->storeAs('public/uploads', $fileName);
    
                Imagen::create(['id_producto' => $producto->id_producto, 'nombre' => 'uploads/'.$fileName]);
            }
        }

        return redirect()->route('dashboard');           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        if (Auth::check())
        {
            $producto = Producto::find($id);
    
            return view('productos.show',[
                'producto' => $producto,
                'userId' => Auth::id(),
            ]);
        }
        return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        $categorias = Categoria::orderBy('nombre','DESC')->get();
        $estadosProducto = EstadoProducto::all();
        $producto = Producto::find($id);
        // $imagenes = Imagen::where('id_producto','=',$id)->get();
        // return $producto->imagenes;
        return view('productos.edit',[
            'producto' => $producto,
            'categorias' => $categorias,
            'estadosProducto' => $estadosProducto,
        ]);
    }

    
    public function vendido(string $id)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        $producto = Producto::find($id);
        $producto->update(['id_estado_producto' => 3]);
        return redirect()->route('productos.tusproductos');
    }

    public function like(string $idProducto)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        $favorito = Favorito::where('id_producto','=',$idProducto)->where('id_user','=',Auth::id())->first();
        // Si ya existe un registro lo eliminamos
        if($favorito){
            $favorito->delete();
            return redirect()->back();
        }
        
        $favorito = new Favorito([
            'id_user' => Auth::id(),
            'id_producto' => $idProducto
        ]);
        $favorito->save();
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->rol->id_role == 2){
            return redirect()->route('usuarios.index');
        }
        $producto = Producto::find($id);
        
        if ($request->hasFile('imagenes') && $producto->imagenes->first() != null){
            // Actualizar en BD
            foreach ($request->file('imagenes') as $imagen) {
                // Eliminamos la imagen
                Storage::delete($producto->imagenes->first()->nombre);

                $fileName = $imagen->getClientOriginalName();
                // Guardar cada imagen en el directorio storage/app/carpeta_destino
                $nuevaRuta = $imagen->storeAs('public/uploads', $fileName);
    
                $imagen = Imagen::find($producto->imagenes->first()->id);
                $imagen->update([$producto->id_producto, 'nombre' => 'uploads/'.$fileName]);
            }
        }
        $producto->update($request->only([
            'nombre','id_categoria','id_estado_producto','precio','descripcion'
        ]));
        return redirect()->route('productos.tusproductos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Producto::find($id)->delete();
        return redirect()->route('productos.tusproductos');
    }
}
