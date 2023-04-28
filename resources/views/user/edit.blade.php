@extends('dashboard')


@section('content')
<form action="{{route('user.edit' , ['id' => $user->id])}}" method="POST">
    @method('PUT')
    @csrf

<div>
    <div class="mb-6">
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" id="nome" value="{{$user->name}}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" value="{{$user->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-6">
    <label for="access_product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de acesso produto</label>
    <select id="access_product" name="access_product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Selecione</option>
    <option value="1" {{$user->can('product') ? 'selected' : ''}}>Admin</option>
    <option value="0" value="1" {{$user->can('product') ? '':'selected' }}>User</option>
    </select>
    </div>

    <div class="mb-6">
    <label for="access_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de acesso produto</label>
    <select id="access_brand" name="access_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option value="1" {{$user->can('brand') ? 'selected' : ''}}>Admin</option>
    <option value="0" {{$user->can('brand') ? '':'selected' }}>User</option>
    </select>
    </div>

    <div class="mb-6">
        <label for="access_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de acesso categoria</label>
        <select id="access_category" name="access_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected disabled>Selecione</option>
        <option value="1" {{$user->can('category') ? 'selected' : ''}}>Admin</option>
        <option value="0" {{$user->can('category') ? '':'selected' }}>User</option>
        </select>
    </div>
    @if($errors->all())
    <div class="p-4 bg-red-600 rounded text-white font-bold">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

</div>
<button  type="submit" class="w-full mt-2 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Salvar</button>
</form>
@endsection
