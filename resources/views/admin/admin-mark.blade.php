@extends('layouts.app')

@section('content')
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Все марки</h1>
            </div>
            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <div class="flex items-center mb-4 sm:mb-0">
                    <form class="sm:pr-3" method="POST" action="{{ route('mark.search') }}">
                        @csrf
                        <label for="products-search" class="sr-only">Поиск</label>
                        <div class="relative flex gap-2 w-48 mt-1 sm:w-64 xl:w-96">
                            <input type="text" name="word" id="mark-search" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Поиск по маркам">
                            <button  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="submit">
                                Искать
                            </button>
                        </div>
                    </form>
                </div>
                <button id="createProductButton" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                    Добавить
                </button>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600 border rounded">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Название
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Логотип
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-gray-500 text-center uppercase dark:text-gray-400">
                                Действия
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($marks as $mark)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $mark->name }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ asset('/storage/' . $mark->photo) }}" alt="{{ $mark->name }}" class="w-10"></td>
                                <td class="p-4 space-x-2 whitespace-nowrap text-center">
                                    <button type="button" id="updateProductButton" data-id="{{ $mark->id }}" data-name="{{ $mark->name }}" data-photo="{{ asset('/storage/' . $mark->photo) }}" data-drawer-target="drawer-update-product-default" data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                        Изменить
                                    </button>
                                    <button type="button" id="deleteProductButton" data-id="{{ $mark->id }}" data-name="{{ $mark->name }}" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus-ring-red-300 dark:focus-ring-red-900">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        Удалить
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @component('components.admin.mark.edit')@endcomponent
    @component('components.admin.mark.delete')@endcomponent
    @component('components.admin.mark.add')@endcomponent

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateButtons = document.querySelectorAll('#updateProductButton');
            const updateForm = document.querySelector('#drawer-update-product-default form');
            const nameInput = updateForm.querySelector('input[name="name"]');
            const idInput = updateForm.querySelector('input[name="id"]');
            const photoPreview = updateForm.querySelector('img');

            updateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const markId = this.getAttribute('data-id');
                    const markName = this.getAttribute('data-name');
                    const markPhoto = this.getAttribute('data-photo');

                    // Заполняем форму данными выбранной марки
                    nameInput.value = markName;
                    idInput.value = markId;
                    photoPreview.src = markPhoto;
                });
            });

            const deleteButtons = document.querySelectorAll('#deleteProductButton');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const markId = this.getAttribute('data-id');
                    const markName = this.getAttribute('data-name');
                    const hiddenInput = document.querySelector('#drawer-delete-product-default input[name="id"]');
                    const confirmationText = document.querySelector('#drawer-delete-product-default h3');

                    if (hiddenInput) {
                        hiddenInput.value = markId;
                    }

                    if (confirmationText) {
                        confirmationText.textContent = `Вы уверены что хотите удалить марку ${markName}?`;
                    }
                });
            });
        });
    </script>
@endsection
