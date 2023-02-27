<x-layout>
    <x-slot:title>
        Comment
        </x-slot>


</x-layout>

<div class="d-flex justify-content-start p-5">
    <a href="{{ route('comment.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
<div class="d-flex justify-content-center p-5">

    <div class="d-flex flex-column  justify-content-center  w-75 ">

        <div class="card">
            <h5 class="card-header">{{ $comment->post->title }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $comment->body }}</p>
                <p>{{ date('d-m-Y', strtotime($comment->created_at)) }}</p>
                <p href="#" class="btn btn-secondary">{{ $comment->author->name }}</p>
            </div>
        </div>




    </div>
</div>
