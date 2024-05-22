 <x-app-layout >

    
    <div class="grid gap-y-8">

        <div class="p-20 text-center text-2xl " >
          <h1>"Conéctate, compra, vende: <br>
            el mercado de segunda mano de TECSUP."</h1>
            <div class="flex flex-row gap-x-5 mt-10 h-12 justify-center">
            <form action="{{route('dashboard')}}" class="w-full max-w-3xl">
              <input name="search" class="w-full max-w-3xl text-sm pl-10 bg-slate-300 rounded-full border-indigo-300 border my-2" type="text" placeholder="Buscar articulos">
              <button class="rounded-full bg-indigo-300 py-2 px-6 text-sm font-medium text-white">Buscar</button>
            </form>
            </div>
        </div>
        
        <div class="px-20">
          <!-- MEJORES CALIFICADOS: -->
          <h2 class="text-xl font-medium mb-8">Articulos populares</h2>
          <div class="cards flex flex-wrap  gap-y-5 xl:gap-x-10 md:gap-x-4 sm:gap-x-10">
            @forelse ($productosPopulares as $producto)
            <div class="card " style="width: 200px;">
              <a href="{{route('productos.show',$producto->id_producto)}}">
                @if ($producto->imagenes->isNotEmpty())
                  <img src="{{asset('storage/'.$producto->imagenes->first()->nombre)}}">
                @endif
                <div class="flex flex-row bg-slate-200 rounded-b-xl py-3 px-5 justify-between">
                  <div class="text-sm flex flex-col ">
                    <p>{{$producto->nombre}}</p>
                    <span>S/{{$producto->precio}}</span>
  
                    <span class="flex flex-row gap-x-1">
                      @for ($i = 0; $i < $producto->puntuacion; $i++)
                      <i class='bx bxs-star ' style='color:#e8de09'></i>
                      @endfor
                    </span>
                    <span>{{$producto->categoria->nombre}}</span>
                  </div>
                </a>    
                  <div class="flex items-center">
                    <a href="{{route('productos.like',$producto->id_producto)}}">
                      @if ($producto->favoritoByUser($userId)->first())                        
                        <i class='bx bxs-heart text-2xl' style='color:#e84141' ></i>
                      @else
                        <i class='bx bx-heart text-2xl' style='color:#b3aeae'  ></i>  
                      @endif
                    </a>
                  </div>
              </div>
            </div>    
            @empty
                
            @endforelse
            
          </div>
        </div>
        <div class="px-20">
          <a href="">
            <img class="" src="{{asset('img/banner-productos.svg')}}" alt="">
          </a>
        </div>
        <div class="px-20">
          <!-- MEJORES CALIFICADOS: -->
          <h2 class="text-xl font-medium mb-8">Novedades</h2>
          <div class="cards flex flex-wrap gap-y-5 xl:gap-x-10 md:gap-x-4 sm:gap-x-10">
            @forelse ($productosNovedosos as $producto)
            <div class="card" style="width: 200px;">
              <a href="{{route('productos.show',$producto->id_producto)}}">
                @if ($producto->imagenes->isNotEmpty())
                  <img src="{{asset('storage/'.$producto->imagenes->first()->nombre)}}">
                @endif
                <div class="flex flex-row bg-slate-200 rounded-b-xl py-3 px-5 justify-between">
                  <div class="text-sm flex flex-col ">
                    <p>{{$producto->nombre}}</p>
                    <span>S/{{$producto->precio}}</span>
  
                    <span class="flex flex-row gap-x-1">
                      @for ($i = 0; $i < $producto->puntuacion; $i++)
                      <i class='bx bxs-star ' style='color:#e8de09'></i>
                      @endfor
                    </span>
                    <span>{{$producto->categoria->nombre}}</span>
                  </div>
                </a>    
                  <div class="flex items-center">
                    <a href="{{route('productos.like',$producto->id_producto)}}">
                      @if ($producto->favoritoByUser($userId)->first())                        
                        <i class='bx bxs-heart text-2xl' style='color:#e84141' ></i>
                      @else
                        <i class='bx bx-heart text-2xl' style='color:#b3aeae'  ></i>  
                      @endif
                    </a>
                  </div>
                </div>
            </div>     
            @empty
                
            @endforelse
          </div>
        </div>
      </div>
</x-app-layout>
