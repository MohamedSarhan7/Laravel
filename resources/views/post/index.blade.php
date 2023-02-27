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
    <a href="{{ route('post.create') }}" class="btn btn-primary">
        NEW POST
    </a>

</div>
<div class="p-5">
    <table class="table  ">
        <thead class="">
            <th class="col-1">id</th>
            <th class="col-2">Title</th>
            <th class="col-2">Author</th>
            {{-- <th class="col-5">Content</th> --}}
            <th class="col-1">Created At</th>
            <th class="col-4">Action</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->name }}</td>
                    {{-- <td>{{ $post->content }}</td> --}}
                    <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>

                    <td class="m-5">
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info col-3">
                                View
                            </a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary col-3">
                                Edit
                            </a>
                            <form class="col-3" action="{{ route('post.delete', $post->id) }}" method="post">
                                @method('DELETE')
                                @csrf()
                                <button type="submit" class="btn btn-danger w-100">Delete </button>
                            </form>

                        </div>
                    </td>
                    {{-- <td class="m-5">
                        <div class="d-flex flex-row justify-content-around">
                            <a href="{{ route('edit', $post->id) }}">
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
    {{ $posts->links('pagination::bootstrap-5') }}


</div>
