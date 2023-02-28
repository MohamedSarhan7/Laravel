<x-layout>
    <x-slot:title>
        ITI - Laravel
        </x-slot>


</x-layout>

<div class="d-flex justify-content-start p-5">
    <a href="{{ route('post.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
<div class="d-flex justify-content-center p-5">

    <div class="d-flex flex-column  justify-content-center  w-75 ">

        {{-- <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <p>{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                <p href="#" class="btn btn-secondary">{{ $post->author->name }}</p>
            </div>
        </div> --}}

        <div class="card">
            <h2 class="text-center">Post </h2>
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $post->content }}</p>
                    <footer class="blockquote-footer">{{ $post->user->name }}
                        {{-- <cite title="Source Title">Author: </cite> --}}
                    </footer>
                </blockquote>
            </div>
        </div>
        <div class="card mt-5  ">
            <h2 class="text-center">Author </h2>
            <div class="card-header">
                {{ $post->user->name }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $post->user->email }}</p>
                    {{-- <footer class="blockquote-footer">{{ $post->author->name }} 
                        <cite title="Source Title">Author: </cite>
                    </footer> --}}
                    <a href="{{ route('user.show', $post->user->id) }}" class="btn btn-primary"> View </a>
                </blockquote>
            </div>
        </div>




        <table class="table  ">
            <thead class="">
                <th class="col-1">id</th>
                <th class="col-2">Content</th>
                <th class="col-2">Post Title</th>
                {{-- <th class="col-5">Content</th> --}}
                <th class="col-1">Created At</th>
                <th class="col-4">Action</th>
            </thead>
            <tbody>
                @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>{{ $comment->post->title }}</td>
                        {{-- <td>{{ $post->content }}</td> --}}
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
</div>
