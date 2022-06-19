<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-4">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h5>Permission Lists</h5>
                    @if(session('message'))
                        <x-alert type="warning" :message="session('message')"></x-alert>
                    @endif

                    <form action="{{route('permission.store')}}" method="POST">
                        @csrf
                    <select name="role" class="form-select col-md-2" aria-label="Default select example">
                        <option selected >Select Role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <hr>
                    @foreach($data as $permission)
                        <ul>
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{$permission->name}}" id="{{'id-'.$permission->name}}">
                            <label class="form-check-label" for="{{'id-'.$permission->name}}">
                                {{$permission->name}}
                            </label>
                        </ul>
                    @endforeach
                        <button class="">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
