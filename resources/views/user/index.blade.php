<x-layout>
    <x-slot:title>
        ITI - Laravel
        </x-slot>

        <x-slot:page>


        </x-slot:page>
        {{-- <x-slot:hello>
            Hola amigos!
        </x-slot:hello> --}}




</x-layout>

<div class="d-flex justify-content-end p-5">
    <a href="{{ route('user.create') }}" class="btn btn-primary">
        NEW User
    </a>

</div>

<div class="p-5">
    <table class="table  ">
        <thead class="">
            <th class="col-1">id</th>
            <th class="col-2">Name</th>
            <th class="col-2">Email</th>
            <th class="col-1">Created At</th>
            <th class="col-4">Action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                    <td class="m-5">
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info col-3">
                                View
                            </a>
                            {{-- <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary col-3">
                                Edit
                            </a>
                            <form class="col-3" action="{{ route('user.delete', $user->id) }}" method="user">
                                @method('DELETE')
                                @csrf()
                                <button type="submit" class="btn btn-danger w-100">Delete </button>
                            </form> --}}

                        </div>
                    </td>
                    {{-- <td class="m-5">
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('edit', $user->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <button class="btn btn-danger">Delete </button>
                        </div>
                    </td> --}}
                </tr>
            @endforeach



        </tbody>

    </table>

</div>
<div>
    {{ $users->links('pagination::bootstrap-5') }}


</div>
