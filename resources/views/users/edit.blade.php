<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('user.update',$user->id)}}" class="col-6" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="user">User</label>
                        <input class="form-control" id="user" name="name" value="{{$user->name}}">
                        <select name="role" class="form-select col-md-2 my-2" aria-label="Default select example">
                            <option selected >Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{old($role->id)?:$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <button  class="btn btn-primary my-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
