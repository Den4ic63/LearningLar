<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.Roles') }}
        </h2>
    </x-slot>
    <div class="container mt -6">
        <div class="row">
            <div class="col-md-12">
                @foreach($roles as $role)
                    <div class="card mb-4">
                        <h5 class="card-header">{{$role->name}}</h5>
                        <div class="card-body ">
                            <a href="{{route('edit-role',$role->id)}}" class="btn btn-primary">{{__('main.Update_Role')}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
