<x-layout>
    <x-slot:title>
        ITI - Laravel
        </x-slot>


</x-layout>


<div class="d-flex justify-content-end p-5">
    <a href="{{ route('create-new-post') }}" class="btn btn-primary">
        NEW POST
    </a>

</div>
<div class="d-flex justify-content-center p-5">

    <div class="d-flex flex-column  justify-content-center  w-75 ">
        @foreach ($posts as $post)
            <div class="card mt-3 mb-3">
                <h2 class="text-center">{{ $post->id }} </h2>
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $post->content }}</p>
                        <footer class="blockquote-footer">{{ $post->user->name }}
                            <div>
                                <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('comment.create', $post->id) }}">add Comment</a>

                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endforeach
    </div>

</div>
