<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
              <form method="post" action="{{route('store-user')}}">
                  @csrf
                  <!-- Name -->
                  <div>
                      <x-input-label for="name" :value="__('Name')" />

                      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                  </div>

                  <!-- Second Name -->
                  <div>
                      <x-input-label for="second_name" :value="__('Second Name')" />

                      <x-text-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" :value="old('second_name')" required autofocus />
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
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                  </div>

                  <!-- Password -->
                  <div class="mt-4">
                      <x-input-label for="password" :value="__('Password')" />

                      <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                  </div>

                  <!-- Confirm Password -->
                  <div class="mt-4">
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                      <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                  </div>

                  <div class="mt-4">
                      <x-input-label value="Avatar" />

                      <input type="file" name="file">
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
