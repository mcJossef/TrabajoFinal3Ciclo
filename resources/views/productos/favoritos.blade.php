<x-app-layout>
  {{-- dd($favoritos[0]->producto()->get()->first()->nombre); --}}
  <div class="px-20 py-10 grid gap-y-10" style="min-height: 70vh">
    <div>
      <h1 class="text-2xl font-semibold">Tus favoritos</h1>
      <p class="text-slate-500">Estos son los producto sde Tecsup Garage que más te gustan.</p>
    </div>
    <div>
      <h2 class="text-lg text-blue-500 mb-3">Productos</h2>
      <div class="bg-white rounded-lg p-5 flex flex-wrap ">
        @forelse ($favoritos as $favorito)    
        <a href="{{route('productos.show',$favorito->producto()->first()->id_producto)}}">
          <div class="card gap-y-6 p-3 bg-white shadow m-2 rounded-lg flex flex-col justify-between" style="width:240px;">
            <div class="flex justify-center">
              @if ($favorito->producto()->first()->imagenes->isNotEmpty())
                <img  width="230" class="rounded" src="{{asset('storage/'.$favorito->producto()->first()->imagenes->first()->nombre)}}" alt="">
              @endif
            </div>
            <div>
              <p class="text-sm font-semibold">{{$favorito->producto()->first()->nombre}}</p>
              <div class="flex fle-row justify-between ">
                <span>S/{{$favorito->producto()->first()->precio}}</span>
                <a href="{{route('productos.like',$favorito->producto()->first()->id_producto)}}" class="pr-4">
                  <i class='bx bxs-heart text-lg' style='color:#e84141' ></i>
                </a>
              </div>
            </div>
          </div>
        </a>
        @empty
            
        @endforelse
      </div>
    </div>



  </div>

</x-app-layout>