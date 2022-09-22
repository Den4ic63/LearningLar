<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt -6">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('update-user',$user->id)}}">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
                    </div>

                    <!-- Second Name -->
                    <div>
                        <x-input-label for="second_name" :value="__('Second Name')" />

                        <x-text-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" value="{{$user->second_name}}" required autofocus />
                    </div>

                    <!-- Roles -->
                    <div>
                        <!--

                        <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required autofocus />
                        -->
                        {{--              @role('admin')--}}
                        <x-input-label for="" :value="__('Role')" />
                        <select name="role_id" class="form-control" >
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}"> {{ $role['name'] }}</option>
                            @endforeach
                        </select>
                        {{--                @endrole--}}
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label value="Photo" />
                        <input type="file" name="file">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</x-app-layout>
