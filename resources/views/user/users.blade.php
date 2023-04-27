@extends('dashboard')


@section('content')

<div class="flex w-full font-bold items-center">
    <div class="w-2/12">
        Email
    </div>
    <div class="w-2/12">
        Name
    </div>
    <div class="w-2/12">
        Products Access
    </div>
    <div class="w-2/12">
        Brand Access
    </div>
    <div class="w-2/12">
        Category Access
    </div>
    <div class="w-2/12">
        Action
    </div>
</div>
    @if($users)
    <div class="flex mt-4 shadow  font-semibold items-center">
        @foreach ($users as $user)
            <div class="w-2/12">
                {{$user->email}}
            </div>
            <div class="w-2/12">
                {{{$user->name}}}
            </div>
            <div class="w-2/12">
                @if($user->can('products'))
                <div> Admin </div>
                @else
                <div> User </div>

                @endif
            </div>
            <div class="w-2/12">
                @if($user->can('brand'))
                <div> Admin </div>
                @else
                <div> User </div>

                @endif
            </div>
            <div class="w-2/12">
                @if($user->can('category'))
                <div> Admin </div>
                @else
                <div> User </div>

                @endif
            </div>
            <div class="w-2/12 flex">
                <button type="button" class="text-white font-bold bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Editar</button>
                <button type="button" class="text-white font-bold bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"> Excluir</button>
            </div>
        @endforeach
    </div>
    @else
        Nao ha usuarios cadastrados!
    @endif

@endsection
