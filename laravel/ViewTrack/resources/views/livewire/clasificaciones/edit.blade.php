<div x-data="{ modalIsOpen: @entangle('open') }">
    <!-- Botón abrir modal -->
    <a 
        x-on:click="modalIsOpen = true" 
        type="button"
        class="cursor-default inline-flex items-center
         gap-2 rounded-lg bg-blue-600 px-3 py-1.5 text-xs 
         font-medium tracking-wide text-white shadow-sm 
         transition hover:bg-blue-700 focus-visible:outline-offset-2 
         focus-visible:outline-blue-600 active:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed dark:bg-blue-500 dark:hover:bg-blue-400 dark:focus-visible:outline-blue-400">
        <!-- Ícono Edit -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="size-4">
            <path
                d="M16.862 4.487l2.651 2.65a1.5 1.5 0 010 2.122l-9.193 9.193a4.5 4.5 0 01-1.897 1.13l-3.358.96a.75.75 0 01-.927-.927l.96-3.358a4.5 4.5 0 011.13-1.897l9.193-9.193a1.5 1.5 0 012.122 0z"/>
        </svg>
        update
       
    </a>

    <!-- Modal -->
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

        <!-- Modal Dialog -->     
        <div x-show="modalIsOpen"
             x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
             x-transition:enter-start="opacity-0 -translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">

            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                <h3 id="modalCreateTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong">
                    Editar Clasificación
                </h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5 cursor-pointer text-on-surface hover:text-on-surface-strong dark:text-on-surface-dark hover:dark:text-on-surface-dark-strong">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Dialog Body -->
            <div class="px-4 py-6">
                <form wire:submit.prevent="update" class="space-y-4">

                    <!-- Clasificación -->
                    
                    <div>
                        <x-form.input wire:model="form.nombre" label="Nombre" name="form.nombre" placeholder="*"/>
                        
                    </div>

                    <!-- Descripción -->

                    <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="form.descripcion" class="w-fit pl-0.5 text-sm">Descripción</label>
                        <textarea id="form.descripcion" wire:model="form.descripcion" class="w-full rounded-radius border border-outline bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark" rows="3" placeholder="50 caracteres Max."></textarea>

                        @error('form.descripcion') 
                            <span class="text-red-600 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>
                </form>
            </div>

            <!-- Dialog Footer -->
            <div class="flex flex-col-reverse justify-between gap-2 border-t border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20 sm:flex-row sm:items-center md:justify-end">
                <button x-on:click="modalIsOpen = false" 
                        type="button" 
                        class="whitespace-nowrap rounded-radius px-4 py-2 text-center text-sm font-medium tracking-wide text-on-surface transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:text-on-surface-dark dark:focus-visible:outline-primary-dark">
                    Cancelar
                </button>

                <button
                        wire:click="update"
                        type="button" 
                        class="whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
