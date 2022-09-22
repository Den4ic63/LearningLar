<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt -6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('add-user')}}" class="btn btn-success mb-4 mt-4">{{__('main.Create_User')}}</a>
                @foreach($users as $user)
                <div class="card mb-4">
                    <h5 class="card-header">{{$user->name}}</h5>
                    <div class="card-body ">
                        <p>{{$user->email}}</p>
                        <a href="{{route('edit-user',$user->id)}}" class="btn btn-primary">{{__('main.Update_User')}}</a>

                        <form action="{{route('delete-user',$user->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{__('main.Delete_User')}}</button>
                        </form>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
