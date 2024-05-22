<x-app-layout>

  <div class="px-20 py-10 grid gap-y-10" style="min-height: 70vh">
    <div class="relative overflow-x-auto sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
          <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                <div class="flex justify-between mb-3">
                    Usuarios
                    <a href="{{route('dashboard')}}" class="py-2 px-3 bg-blue-500 rounded text-white text-sm">PRODUCTOS</a>
                </div>
              <p class="mt-1 text-sm font-normal  text-gray-400">¡Bienvenido al Panel de Administrador de nuestra plataforma! Tu función como administrador es crucial para mantener un entorno seguro y respetuoso para todos los usuarios. En esta sección, encontrarás la "Tabla de Desactivación de Usuarios", una herramienta diseñada para abordar situaciones en las que se sospecha que algunos usuarios han infringido nuestras políticas o reglas comunitarias.</p>
          </caption>
          <thead class="text-xs  uppercase bg-gray-50  text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      #
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nombre
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Email
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Rol
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Fecha de creación
                  </th>
                  <th scope="col" class="px-6 py-3 ">
                      <span class="sr-only">Edit</span>
                  </th>
              </tr>
          </thead>
          <tbody>
              @forelse ($usuarios as $key => $usuario)
              <tr class="bg-white border-b  border-gray-300">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$key}}
                </th>
                <td class="px-6 py-4">
                    {{$usuario->name}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->email}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->rol->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$usuario->created_at}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a class="font-medium text-red-600  hover:underline" style="cursor: pointer;"
                      onclick="document.getElementById('{{$usuario->id.'-destroy-form'}}').submit();"
                      >Eliminar</a>
                    <form id="{{$usuario->id.'-destroy-form'}}" 
                      action="{{route('usuarios.destroy',$usuario->id)}}" 
                      method="POST">
                      @csrf @method('DELETE')
                    </form>
                </td>
            </tr>    
              @empty
                  
              @endforelse
              
          </tbody>
      </table>
    </div>
  </div>

</x-app-layout>