<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div>
                        <h2 class="text-3xl">Programação do Dia</h2>

                    </div>

                    <table class="table-auto border-collapse">
                        <thead>
                            <tr class="border-y-2">
                                <th class="border-e-2">Qtde Aves</th>
                                <th class="border-e-2">Produtor</th>
                                <th class="border-e-2">Sexo</th>
                                <th class="border-e-2">Peso Médio Ave</th>
                                <th class="border-e-2">Aves por Caixa</th>
                                <th class="border-e-2">Data</th>
                                <th class="border-e-2">Início Jejum</th>
                                <th class="border-e-2">Horário</th>
                                <th class="border-e-2">Turma Apanhado</th>
                                <th class="border-e-2">Dias Vida</th>
                                <th class="border-e-2">Horário Previsto Entrega</th>
                                <th class="border-e-2">Horário Previsto Início Abate</th>
                                <th class="border-e-2">Preferência</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cargas as $carga)
                            <tr class="">
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->qtde_aves }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->produtor }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->sexo }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->peso_medio_ave }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->aves_por_caixa }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->data }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->inicio_jejum }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->horario }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->turma_apanhado }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->dias_vida }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->horario_previsto_entrega }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->horario_previsto_inicio_abate }}</td>
                                <td class="border-e-2 border-b-2 p-1">{{ $carga->preferencia }}</td>
                                <td class="border-b-2 p-1">
                                    <button type="button"
                                        class="modal-toggler bg-red-900 hover:bg-red-900 text-white
                                        font-bold py-2 px-4 border border-black-700 rounded">
                                        Imprevisto
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Disparar alerta de imprevisto
                                    </h3>
                                    <button type="button" id="" class="moddal-close-button text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Fechar</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <h2 class="text-3xl leading-relaxed text-gray-500 dark:text-gray-400">
                                        Forneça as informações da emergência
                                    </h2>
                                    <form action="">
                                        @csrf <!-- {{ csrf_field() }} -->
                                        <div class="mb-5">
                                            <label for="razao" class="block">Razão e Instruções</label>
                                            <textarea name="razao" cols="50" rows="10" class="rounded-md text-gray-100 dark:text-gray-900"></textarea>
                                            <x-input-error :messages="$errors->get('razao')" class="mt-2" />
                                        </div>
        
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Enviar
                                            </button>

                                            <button type="reset" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Limpar
                                            </button>
                                            
                                            <button type="button" class="moddal-close-button ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('carga.save') }}" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="grid grid-rows-1 grid-flow-col gap-8 mt-8">
                            <h2 class="text-3xl">
                                Cadastrar novo transporte
                            </h2>
                            <div align="right" class="">
                                <button type="submit"
                                    class="w-4/12 bg-gray-900 hover:bg-indigo-900 text-white
                                    font-bold py-2 px-4 border border-blue-700 rounded">
                        
                                    Enviar
                                </button>
                            </div>
                        </div>
                        <div class="grid place-items-start grid-cols-3 gap-4 my-4">
                        
                                <div class="mb-5">
                                    <label for="qtde_aves" class="block">Quantidade de Aves</label>
                                    <input type="number" name="qtde_aves" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('qtde_aves')" class="mt-2" />
                                </div>
                        
                                <div class="mb-5">
                                    <label for="produtor" class="block">Produtor</label>
                                    <select name="produtor" id="produtor" class="rounded-md text-gray-100 dark:text-gray-900">
                                        @foreach ($produtores as $produtor)
                                            <option value="{{ $produtor->id }}">{{ $produtor->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('produtor')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <h3>Sexo</h3>
                                    <div class="">
                                        <input type="radio" name="sexo" id="femea" value="femea" class="me-2">
                                        <label for="femea" class="">Fêmea</label>
                                    </div>
                                    <div class="">
                                        <input type="radio" name="sexo" id="macho" value="macho" class="me-2">
                                        <label for="macho" class="">Macho</label>
                                    </div>
                                    <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="peso_medio_ave" class="block">Peso médio ave</label>
                                    <input type="text" name="peso_medio_ave" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('peso_medio_ave')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="aves_por_caixa" class="block">Aves por caixa</label>
                                    <input type="number" name="aves_por_caixa" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('aves_por_caixa')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="data" class="block">Data</label>
                                    <input type="date" name="data" value="{{ date('Y-m-d') }}" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('data')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="inicio_jejum" class="block">Inicio Jejum</label>
                                    <input type="time" name="inicio_jejum" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('inicio_jejum')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="horario" class="block">Horário</label>
                                    <input type="time" name="horario" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('horario')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="turma_apanhado" class="block">Turma Apanhado</label>
                                    <select name="turma_apanhado" id="turma_apanhado" class="rounded-md text-gray-100 dark:text-gray-900">
                                        <option value="Fulano">Fulano</option>
                                        <option value="Cicrano">Cicrano</option>
                                        <option value="Beltrano">Beltrano</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('turma_apanhado')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="dias_vida" class="block">Dias Vida</label>
                                    <input type="number" name="dias_vida" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('dias_vida')" class="mt-2" />
                                </div>

                                <div class="mb-5">
                                    <label for="horario_previsto_entrega" class="block">Horário Previsto Entrega</label>
                                    <input type="time" name="horario_previsto_entrega" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('horario_previsto_entrega')" class="mt-2" />
                                </div>
                        
                                <div class="mb-5">
                                    <label for="horario_previsto_inicio_abate" class="block">Horário Previsto Inicio Abate</label>
                                    <input type="time" name="horario_previsto_inicio_abate" class="rounded-md text-gray-100 dark:text-gray-900">
                                    <x-input-error :messages="$errors->get('horario_previsto_inicio_abate')" class="mt-2" />
                                </div>
                        
                        </div>
                    </form>
                    {{-- <td>{{ $carga->preferencia }}</td> --}}
                </div>
            </div>
        </div>
    </div>




    <!--Modal togglers-->
    <script>
        // Seleciona todos os botões com a classe modal-toggler
        const modalTogglers = document.querySelectorAll('.modal-toggler');

        // Seleciona o modal
        const modal = document.getElementById('default-modal');

        // Adiciona um evento de clique a cada botão
        modalTogglers.forEach(button => {
        button.addEventListener('click', function() {
            // Alterna a visibilidade do modal ao clicar em qualquer botão
            if (modal.style.display === 'block') {
            modal.style.display = 'none';
            } else {
            modal.style.display = 'block';
            }
        });
        });

        // Fecha o modal quando o usuário clica no botão de fechar
        const closeModal = document.querySelectorAll('.moddal-close-button');
        closeModal.forEach(button => {
            button.addEventListener('click', function() {
                modal.style.display = 'none';

            });
        });

    </script>

    <!--Input numbers-->
    <script>
        const numericInputs = document.querySelectorAll('input[type="number"]');
      
        numericInputs.forEach(input => {
          input.addEventListener('input', function(event) {
            const numericValue = event.target.value.replace(/\D/g, '');
            event.target.value = numericValue;
          });
        });
    </script>
</x-app-layout>
