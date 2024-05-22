<x-app-layout>
  
  <div class="flex gap-y-8 justify-center mt-10">

    <div class=" text-2xl md:w-1/2"  >
      <div class="bg-white rounded-lg p-10 flex flex-col items-center shadow">
        <div class="text-start w-full">
          <h3 class="text-lg font-semibold">¿Qué subiras?</h3>
          <p class="text-base text-slate-500 font-medium">En Tecsup Garage hay sitio para (casi) todo</p>
        </div>
        <div class="py-5">
          <img style="width: 500px;" class="rounded-lg" src="{{asset('img/que-subiras.png')}}" alt="">
        </div>
      </div>

      {{-- todo CAMBIAR AQUI A UPDATE --}}
      <form action="{{route('productos.update',$producto->id_producto)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="bg-white rounded-lg p-10 flex flex-col mt-5 shadow">
          <p class="text-lg font-semibold">Información del Producto</p>
          <div class="grid gap-y-3 mt-5">
            <label class="text-sm">¿Que vendes? Proporciona toda información relevante del producto</label>
            <input value="{{$producto->nombre}}" name="nombre" type="text" class="w-full bg-slate-200 rounded-lg border border-indigo-300">
          </div>
          <div class="flex flex-row justify-between mt-5">
            <div class="flex flex-col w-1/2 pr-5">
              <label class="text-sm" for="">Categoría</label>
              <select name="id_categoria" class="bg-slate-200 rounded-lg text-sm border border-indigo-300" id="">
                <option selected disbled >Selecciona una categoria</option>
                @foreach ($categorias as $categoria)
                  @if ($categoria->id_categoria == $producto->id_categoria)
                    <option value="{{$categoria->id_categoria}}" selected>{{$categoria->nombre}}</option>        
                  @else
                    <option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}</option>    
                  @endif
                @endforeach
              </select>
            </div>
            <div class="flex flex-col w-1/2 pl-5">
              <label class="text-sm" for="">Estado del producto</label>
              <select name="id_estado_producto" class="bg-slate-200 text-sm rounded-lg border border-indigo-300" id="">
                <option selected disbled >Selecciona un producto</option>
                @foreach ($estadosProducto as $estado)
                  @if ($estado->id_estado_producto == $producto->id_estado_producto)  
                    <option selected value="{{$estado->id_estado_producto}}">{{$estado->estado}}</option>
                  @else                      
                    <option value="{{$estado->id_estado_producto}}">{{$estado->estado}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="grid gap-y-3 mt-5">
            <label class="text-sm">Precio</label>
            <input value="{{$producto->precio}}" name="precio" type="number" class="w-1/3 text-sm bg-slate-200 rounded-lg border border-indigo-300">
          </div>
          <div class="grid gap-y-3 mt-5">
            <label class="text-sm">Describe tu producto</label>
            <textarea name="descripcion" type="text" style="height: 100px;" class="w-full bg-slate-200 rounded-lg text-sm border border-indigo-300">
              {{$producto->descripcion}}
            </textarea>
          </div>
      
        </div>
  
        <div class="bg-white rounded-lg p-8 mt-5 flex flex-col items-center">
          <div class="text-start w-full">
            <h3 class="text-lg font-semibold">Foto</h3>
            <div class="bg-slate-200 border border-indigo-300 py-2 px-2">
              <p class="text-sm font-medium">Te recomendamos que subas más de una foto, la gente lo agradecería</p>
            </div>
          </div>
          
          <div class="flex items-center flex-col justify-center w-full mt-5">
            <div class="flex items-center flex-col justify-center w-full mt-5">
              <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-200 border-dashed rounded-lg cursor-pointer bg-slate-50  hover:bg-slate-100">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      @if ($producto->imagenes->first()->nombre != null)
                        <img style="max-height: 300px;" src="{{asset('storage/'. $producto->imagenes->first()->nombre)}}">
                      @else    
                        <svg class="w-8 h-8 mb-4 text-slate-500 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-slate-500 dark:text-slate-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                      @endif
                  </div>
                  <input id="dropzone-file" type="file" class="hidden" multiple name="imagenes[]" accept="image/*"/>
              </label>
          </div>
          
  
            <button type="submit" class="w-full bg-blue-500 mt-5 rounded text-sm font-semibold text-white py-2">
              Editar Producto
            </button>
          </div> 
  
        </div>
      </form>

    </div>
  </div>  

</x-app-layout>