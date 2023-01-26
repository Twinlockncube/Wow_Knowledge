@extends('layouts.app')

@section('content')
    <div class="container px-4">
        
            <form method="post" action="{{route('rem_perm')}}">
                @csrf
                <div class="mb-6">
                    <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Id</label>
                    <input type="text" id="role_id" name="role_id" value={{$role->id}} class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
                    <input type="text" id="name" name="name"  value={{$role->name}} class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <div class="mb-6">   
                    <label for="permission_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="permission_id" name="permission_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a permission</option>
                    @foreach ($role->permissions as $permission)
                    <option value={{$permission->id}}>{{$permission->name}}</option>
                    @endforeach
                    </select>
                </div>

                <button type="submit" class="text-black border border-rose-800 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Remove Permission</button>
            </form>


            <div class="errors">
            <script>
                setTimeout(function() {
                $('.alert').fadeOut('slow');}, 3000);
            </script>
            @if(session()->has('message'))
                <br>
                <div class="alert flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium"> {{ session()->get('message') }}</span>
                </div>
                </div>
            @elseif(session()->has('error_message'))
                <br>
                <div id="successdiv" class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
            @endif
            </div>


    </div>
@endsection