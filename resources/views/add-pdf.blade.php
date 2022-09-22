<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt -6">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success mt-4">
                        {{session('status')}}
                    </div>
                @endif
                <form method="post" action="{{route('pdf')}}">
                    @csrf
                    <!-- Name File -->
                    <div>
                        <x-input-label for="name" :value="__('Name file')" />

                        <x-text-input id="name_file" class="block mt-1 w-full" type="text" name="name_file" :value="old('name_file')" required autofocus />
                    </div>
                    <!-- Name  -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <!-- Date  -->
                    <div>
                        <x-input-label for="date" :value="__('Date')" />

                        <x-text-input id="date" class="block mt-1 w-full" type="text" name="date" :value="old('date')" required autofocus />
                    </div>
                    <!-- Country  -->
                    <div>
                        <x-input-label for="Country" :value="__('Country')" />

                        <x-text-input id="Country" class="block mt-1 w-full" type="text" name="Country" :value="old('Country')" required autofocus />
                    </div>
                    <!-- City  -->
                    <div>
                        <x-input-label for="city" :value="__('City')" />
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('main.Create') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</x-app-layout>
