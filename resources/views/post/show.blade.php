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

        <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <p>{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                <p href="#" class="btn btn-secondary">{{ $post->author->name }}</p>
            </div>
        </div>




    </div>
</div>
