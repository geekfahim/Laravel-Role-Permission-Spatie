@extends('layouts.master')

@section('content')
    <form action="{{route('role.store')}}" class="col-6" method="POST">
        @csrf
        <x-role-form></x-role-form>
    </form>
@endsection
