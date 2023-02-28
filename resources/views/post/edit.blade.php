<style>
    input #content {
        font-size: large;
    }
</style>
<x-layout>
    <x-slot:title>
        ITI - Laravel
    </x-slot:title>



</x-layout>

<div class="d-flex justify-content-center m-3">
    <h1>Edit Post</h1>
</div>

<div class="d-flex justify-content-start p-5">
    <a href="{{ route('post.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
<div class="">
    <div class="d-flex justify-content-center">

        <form action="{{ route('post.update', $post->id) }}" class="w-50" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="title">Title</label>

            <input id="title" type="text" value="{{ $post->title }}" name="title"
                class="form-control @error('title') is-invalid @enderror">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="user_id">Author</label>


            <select name="user_id" id="user_id" class="form-control">
                <option selected value="{{ $post->user->id }}"> {{ $post->user->name }}</option>

                @foreach ($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                @endforeach


            </select>
            @error('author_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <label for="content">Content</label>

            <input id="content" type="text" value="{{ $post->content }}" style="height: 100px" name="content"
                class="form-control @error('content') is-invalid @enderror">

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-row justify-content-evenly m-5">

                {{-- <input type="reset" class="btn btn-secondary"/> --}}
                <button type="sumbit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
</div>
