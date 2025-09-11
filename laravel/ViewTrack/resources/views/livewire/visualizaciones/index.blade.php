<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <!-- Botón + Modal (separado en componente) -->
    @livewire('visualizaciones.create')

    <!-- success Alert -->
    @if (session('success'))
        @php
            $success = session('success');
            $titulo = $success['titulo'] ?? '';
            $action = $success['action'] ?? '';
        @endphp

        <div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
            class="relative w-full overflow-hidden rounded-radius border border-success bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark"
            role="alert"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <div class="flex w-full items-center gap-2 bg-success/10 p-4">
                <div class="bg-success/15 text-success rounded-full p-1" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-6" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                            clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-2">
                    <h3 class="text-sm font-semibold text-success">Visualización</h3>
                    <p class="text-xs font-medium sm:text-sm">
                        Visualización
                        <span class="font-bold text-green-700 px-2 py-0.5 rounded">{{ $titulo }}</span>
                        @if ($action === 'created')
                            creado exitosamente
                        @elseif ($action === 'updated')
                            actualizado exitosamente
                        @elseif ($action === 'deleted')
                            eliminado exitosamente
                        @endif
                    </p>
                </div>
                <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5"
                        class="w-4 h-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Tabla -->
    <div class="overflow-hidden w-full overflow-x-auto rounded-lg border border-neutral-300 dark:border-neutral-700">
        <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
            <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">ID</th>
                    <th scope="col" class="p-4">Usuario</th>
                    <th scope="col" class="p-4">Contenido</th>
                    <th scope="col" class="p-4">Fecha</th>
                    <th scope="col" class="p-4">minutos_vistos</th>
                    <th scope="col" class="p-2">dispositivo</th>
                    <th scope="col" class="p-4">Progreso</th>
                    <th scope="col" class="p-4">Completado</th>
                    <th scope="col" class="p-4">Calificacion</th>
                    
                    <th scope="col" class="p-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @forelse ($visualizaciones as $visualizacion)
                    <tr class="hover:bg-neutral-100 dark:hover:bg-neutral-800">
                        <td class="p-4">{{ $visualizacion->id }}</td>
                        <td class="p-4">{{ $visualizacion->usuario->name }}</td>
                        <td class="p-4">{{ $visualizacion->contenido->titulo }}</td>
                        <td class="p-4">{{ $visualizacion->fecha_visualizacion }}</td>
                        <td class="p-4">{{ $visualizacion->minutos_vistos }}</td>
                        <td class="p-2">{{ $visualizacion->dispositivo }}</td>
                        <td class="p-4">{{ $visualizacion->progreso_actual }}  %</td>
                        <td class="p-4">{{ $visualizacion->completado ? 'Sí' : 'No' }}</td>
                        <td class="p-4">{{ $visualizacion->calificacion }}</td>
                        <td class="p-4 flex justify-center">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <!-- Botón Update -->
                                <livewire:visualizaciones.edit :id="$visualizacion->id" />


                                <!-- Botón Delete -->
                                <button
                                    wire:confirm="¿Estás seguro que deseas eliminar este contenido?"
                                    type="button"
                                    wire:click='delete({{ $visualizacion }})'
                                    class="inline-flex items-center gap-2 rounded-lg 
                                            bg-red-600 px-3 py-1.5 text-xs font-medium tracking-wide 
                                            text-white shadow-sm transition hover:bg-red-700 
                                            focus-visible:outline-offset-2 focus-visible:outline-red-600 
                                            active:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed
                                            dark:bg-red-500 dark:hover:bg-red-400 dark:focus-visible:outline-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M9 3a1 1 0 00-1 1v1H4.5a.75.75 0 000 1.5h.621l.823 13.142A2.25 2.25 0 008.187 22h7.626a2.25 2.25 0 002.243-2.358l.823-13.142h.621a.75.75 0 000-1.5H16v-1a1 1 0 00-1-1H9zm2.25 6.75a.75.75 0 011.5 0v7.5a.75.75 0 01-1.5 0v-7.5zm-3 0a.75.75 0 011.5 0v7.5a.75.75 0 01-1.5 0v-7.5zm6 0a.75.75 0 011.5 0v7.5a.75.75 0 01-1.5 0v-7.5z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                        Delete
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center">No hay contenidos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4">
            {{ $visualizaciones->links() }}
        </div>
    </div>
</div>
