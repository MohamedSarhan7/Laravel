<style>
    input #content {
        font-size: large;
    }
</style>
<x-layout>
    <x-slot:title>
        ITI - Laravel
        </x-slot>



</x-layout>
<div class="d-flex justify-content-center m-3">
    <h1>New Post</h1>
</div>
<div class="d-flex justify-content-start p-5">
    <a href="{{ route('comment.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
{{-- 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="">
    <div class="d-flex justify-content-center">

        <form action="{{ route('comment.store') }}" class="w-50" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="user_id">Author</label>            
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}"  > {{ $author->name }}</option>
                @endforeach

            </select>
            @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <label for="post_id">Post</label>
            <select name="post_id" id="post_id" class="form-control">
                @foreach ($posts as $post)
                <option value="{{ $post->id }}"  > {{ $post->title }}</option>
                @endforeach


            </select>
            @error('post_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <label for="body">body</label>

            <input id="body" type="text" style="height: 100px" name="body"
                class="form-control @error('body') is-invalid @enderror">

            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-row justify-content-evenly m-5">

                <button type="clear" class="btn btn-secondary">Reset</button>
                <button type="sumbit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
</div>
