<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt -6">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('update-role',$role->id)}}">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$role->name}}" required autofocus />
                    </div>

                    @foreach($permissions as $permission)
                        <div class="form-group">
                            <input type="checkbox" value="{{$permission->id}}" class="form-check-input mt-2">
                            <label class="form-check-label mt-2" for="{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
