@extends('dashboard')


@section('content')
<a href="{{route('user.create')}}">
<button  type="button" class=" font-bold  text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 text-[20px]">
     New User
</button>
</a>
<div class="flex w-full font-bold items-center mt-4">
    <div class="w-3/12">
        Email
    </div>
    <div class="w-3/12">
        Name
    </div>
    <div class="w-2/12">
        Product Access
    </div>
    <div class="w-1/12">
        Brand Access
    </div>
    <div class="w-2/12">
        Category Access
    </div>
    <div class="w-1/12">
        Action
    </div>
</div>
    @if($users)

        @foreach ($users as $user)
        <div class="flex mt-4 shadow  font-semibold items-center">
            <div class="w-3/12" >
                {{$user->email}}
            </div>
            <div class="w-3/12">
                {{{$user->name}}}
            </div>
            <div class="w-2/12">
                @if($user->can('product'))
                <div> Admin </div>
                @else
                <div> User </div>

                @endif
            </div>
            <div class="w-1/12">
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
            <div class="w-1/12 flex">

                    <a href="{{route('user.show', ['id' => $user->id])}}">

                        <button type="button" class="text-white font-bold bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Editar</button></a>

                <form action="{{route('user.delete')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="text" class="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="text-white font-bold bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                       Excluir
                    </button>
                </form>
            </div>
        </div>
        @endforeach

    @else
        Nao ha usuarios cadastrados!
    @endif

@endsection
