<x-app-layout>
  <div class="flex gap-y-8 justify-center mt-10 px-20 flex-col" style="min-height: 65vh">
    <div class="flex justify-between">
      <div>
        <h1 class="text-2xl font-semibold">Tus productos</h1>
        <p class="text-slate-500">Aquí podrás subir productos, gestionar los que ya tienes y destacarlos para venderlos antes.</p>
      </div>
      @if (Auth::user()->rol->id_role == 2)
        <a href="{{route('usuarios.index')}}" class="bg-blue-500 py-2 px-2 text-lg text-white font-semibold rounded" style="height:45px">REGRESAR</a>
      @endif
    </div>
    
    <div class="cards grid gap-y-5">
      @forelse ($productos as $producto)    
        <div class="card bg-white rounded-lg w-full p-5 shadow flex flex-row justify-between items-center">
          @if ($producto->imagenes->isNotEmpty())
            <img class="shadow rounded" src="{{asset('storage/'.$producto->imagenes->first()->nombre)}}" width="100px">
          @endif

          <div class="flex flex-col">
            <span class="font-semibold">S/{{$producto->precio}}</span>
            <span class="text-slate-500">{{$producto->nombre}}</span>
          </div>
          <div class="flex flex-col">
            <span class="text-sm font-semibold">Publicado</span>
            <span class="text-slate-500">{{$producto->fecha_publicacion}}</span>
          </div>
          <div class="flex flex-col">
            <span class="text-sm font-semibold">Categoria</span>
            <span class="text-slate-500">{{$producto->categoria->nombre}}</span>
          </div>
          <div class="flex flex-row">
            @if ($isAdmin)
              <i class='bx bx-trash  border p-2 rounded' style="cursor: pointer"  
              onclick="document.getElementById('{{$producto->id_producto.'-destroy-form'}}').submit();">
              </i>
              <form id="{{$producto->id_producto.'-destroy-form'}}" 
                action="{{route('productos.destroy', $producto->id_producto)}}" 
                method="POST">
                @csrf @method('DELETE')
              </form>  
            @else    
              <i class='bx bx-briefcase-alt-2 border p-2 rounded'  style="cursor: pointer"  
              onclick="document.getElementById('{{$producto->id_producto.'-vendido-form'}}').submit();"
              ></i>
              <form id="{{$producto->id_producto.'-vendido-form'}}" 
                action="{{route('productos.vendido', $producto->id_producto)}}" 
                method="POST">
                @csrf
              </form>
              <a href="{{route('productos.edit', $producto->id_producto)}}">
                <i class='bx bxs-edit  border p-2 rounded'  style="cursor: pointer"  ></i>
              </a>
              <i class='bx bx-trash  border p-2 rounded' style="cursor: pointer"  
                onclick="document.getElementById('{{$producto->id_producto.'-destroy-form'}}').submit();">
              </i>
              <form id="{{$producto->id_producto.'-destroy-form'}}" 
                action="{{route('productos.destroy', $producto->id_producto)}}" 
                method="POST">
                @csrf @method('DELETE')
              </form>
            @endif
          </div>
        </div>
      @empty
        <div class="mx-auto py-5 text-center grid gap-y-3">
          <img src="{{asset('img/no-hay-productos.svg')}}" width="400px" alt="">
          <h3 class="text-xl font-medium">Nada en venta todavía</h3>          
          <span class="text-slate-500">¡Sube algo para vender!</span>
        </div>
      @endforelse
    </div>
  </div>
</x-app-layout>