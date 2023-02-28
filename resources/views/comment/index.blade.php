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
    <a href="{{ route('comment.create') }}" class="btn btn-primary">
        NEW Comment
    </a>

</div>
<div class="p-5">
    <table class="table  ">
        <thead class="">
            <th class="col-1">id</th>
            <th class="col-2">Author</th>
            <th class="col-2">Post Title</th>
            <th class="col-1">Created At</th>
            <th class="col-4">Action</th>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($comment->created_at)) }}</td>

                    <td class="m-5">
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-info col-3">
                                View
                            </a>
                            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-secondary col-3">
                                Edit
                            </a>
                            <form class="col-3" action="{{ route('comment.delete', $comment->id) }}" method="post">
                                @method('DELETE')
                                @csrf()
                                <button type="submit" class="btn btn-danger w-100">Delete </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @endforeach



        </tbody>

    </table>

</div>
<div>
    {{ $comments->links('pagination::bootstrap-5') }}


</div>
