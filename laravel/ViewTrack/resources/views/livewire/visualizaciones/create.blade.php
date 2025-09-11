<div x-data="{ modalIsOpen: @entangle('open') }">
    <button x-on:click="modalIsOpen = true" 
            type="button" 
            class="whitespace-nowrap rounded-radius border border-primary dark:border-primary-dark bg-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
        + Registrar Visualización
    </button>

    <div x-cloak 
         x-show="modalIsOpen" 
         x-transition.opacity.duration.200ms 
         x-trap.inert.noscroll="modalIsOpen" 
         x-on:keydown.esc.window="modalIsOpen = false" 
         x-on:click.self="modalIsOpen = false"
         class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" 
         role="dialog" 
         aria-modal="true" 
         aria-labelledby="modalCreateTitle">

        <div x-show="modalIsOpen"
             x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
             x-transition:enter-start="opacity-0 -translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">

            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                <h3 id="modalCreateTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong">
                     Nueva Visualización de {{$usuario->name}}
                </h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5 cursor-pointer text-on-surface hover:text-on-surface-strong dark:text-on-surface-dark hover:dark:text-on-surface-dark-strong">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="px-4 py-6">
                <form wire:submit="save" class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    <div class="md:col-span-2">
                        <label for="contenido_id" class="text-sm">Contenido</label>
                        <select id="contenido_id" wire:model.live="contenido_id"
                                class="w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="">Seleccione...</option>
                            @foreach ($contenidos as $contenido)
                                <option value="{{ $contenido->id }}">{{ $contenido->titulo }}</option>
                            @endforeach
                        </select>
                        @error('contenido_id') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="dispositivo" class="text-sm">Dispositivo</label>
                        <select id="dispositivo" wire:model="dispositivo"
                                class="w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="">Seleccione...</option>
                            <option value="mobile">Mobile</option>
                            <option value="tablet">Tablet</option>
                            <option value="smart-tv">Smart TV</option>
                            <option value="web">Web</option>
                            <option value="consola">Consola</option>
                        </select>
                        @error('tipo') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <x-form.input wire:model.live="minutos_vistos" type="number" label="Minutos vistos" name="minutos_vistos" placeholder=" <= {{ $max_minutos_vistos }}" />
                    </div>

                    <div>
                        <label for="calificacion" class="text-sm">Calificacion</label>
                        <select id="calificacion" wire:model="calificacion"
                                class="w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="">Seleccione...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @error('calificacion') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <p>Progreso actual de visualización: <span class="font-bold">{{ $progreso }}%</span></p>
                    </div>

                </form>
            </div>

            <div class="flex flex-col-reverse justify-between gap-2 border-t border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20 sm:flex-row sm:items-center md:justify-end">
                <button x-on:click="modalIsOpen = false" 
                        type="button" 
                        class="whitespace-nowrap rounded-radius px-4 py-2 text-center text-sm font-medium tracking-wide text-on-surface transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:text-on-surface-dark dark:focus-visible:outline-primary-dark">
                    Cancelar
                </button>

                <button
                        wire:click="save"
                        type="button" 
                        class="whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>