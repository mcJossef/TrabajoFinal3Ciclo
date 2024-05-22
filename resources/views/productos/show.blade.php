<x-app-layout>
    <div class="py-10">
      <div class="xl:w-1/3 lg:1/2  md:w-1/2  mx-auto grid p-5 self-center bg-white shadow-lg gap-y-5 rounded-lg ">
        <div class="flex flex-row gap-x-5">
          <img style="width: 40px;height:40px;" src="{{asset('img/icon-user.png')}}" alt="">
          <div class="flex flex-col">
            <span>{{$producto->user->name}}</span>
            <span class="flex flex-row gap-x-1">
              @for ($i = 0; $i < $producto->puntuacion; $i++)
              <i class='bx bxs-star' style='color:#e8de09'></i>
              @endfor
            </span>
          </div>
        </div>
        @if ($producto->imagenes->first())            
          <img class="rounded-lg" src="{{asset('storage/'.$producto->imagenes->first()->nombre)}}" alt="">
        @endif
        <div class="flex flex-row justify-between pr-10">
          <div>
            <p>S/{{$producto->precio}}</p>
            <h5>{{$producto->nombre}}</h5>
          </div>
          <div class="">
            <a href="{{route('productos.like',$producto->id_producto)}}" class="bg-slate-200 py-0.5 px-4 rounded-lg mr-1">
              @if ($producto->favoritoByUser($userId)->first())                        
                <i class='bx bxs-heart ' style='color:#e84141' ></i>
              @else
                <i class='bx bx-heart ' style='color:#b3aeae'  ></i>  
              @endif
            </a>
            
            <a class="bg-slate-200 py-0.5 px-4 rounded-lg" target="_blank" href="https://web.whatsapp.com/">
              <i class='bx bxl-whatsapp' style='color:#3aaf39'  ></i>
            </a>
          </div>
        </div>
        <hr>
        <p>{{$producto->descripcion}}</p>
                
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
          COMPRAR
        </button>
  
        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <i class='bx bxs-phone ' style='color:#c7c6c6;font-size:80px;'  ></i>
                        <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Es un placer atenderte. Por favor, siéntete libre de ponerte en contacto con nuestro amable vendedor para cualquier pregunta, consulta o asistencia adicional. Estamos aquí para ayudarte en todo lo que necesites. Puedes comunicarte con nosotros llamando al siguiente número de teléfono: 
                          <span id="textoParaCopiar" class="text-black font-semibold">{{$producto->user->telefono}}</span>.
                        </h3>
                        <button id="botonCopiar" data-modal-hide="popup-modal" type="button" class="text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Copiar número
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
  
      </div>
    </div>
  
    <script>
      document.getElementById('botonCopiar').addEventListener('click', function() {
        // Selecciona el elemento que contiene el texto a copiar
        var elementoParaCopiar = document.getElementById('textoParaCopiar');
      
        // Crea un área de texto temporal para copiar el texto
        var areaDeTexto = document.createElement('textarea');
        areaDeTexto.value = elementoParaCopiar.textContent;
      
        // Agrega el área de texto al documento
        document.body.appendChild(areaDeTexto);
      
        // Selecciona y copia el texto en el área de texto
        areaDeTexto.select();
        document.execCommand('copy');
      
        // Elimina el área de texto temporal
        document.body.removeChild(areaDeTexto);
      
        // Muestra un mensaje o realiza otras acciones si es necesario
        alert('Texto copiado al portapapeles');
      });
      </script>
      
</x-app-layout>