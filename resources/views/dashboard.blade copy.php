<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li>
                            <i class="fa-solid fa-city mr-4"></i><a href={{url('/ciudades')}}>Ciudades</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-person-circle-question mr-4"></i><a href={{url('/estcivil')}}>Estado Civil</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-notes-medical mr-4"></i><a href={{url('/grupos')}}>Grupos Sanguineos</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
