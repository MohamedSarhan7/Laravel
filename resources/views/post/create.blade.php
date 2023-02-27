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
    <a href="{{ route('post.index') }}" class="btn btn-secondary">
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

        <form action="{{ route('post.store') }}" class="w-50" method="Post" enctype="multipart/form-data">
            @csrf

            <label for="title">Title</label>

            <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="author_id">Author</label>

            
            <select name="author_id" id="author_id" class="form-control">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}"  > {{ $author->name }}</option>
                @endforeach


            </select>
            @error('author_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <label for="content">Content</label>

            <input id="content" type="text" style="height: 100px" name="content"
                class="form-control @error('content') is-invalid @enderror">

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-row justify-content-evenly m-5">

                <button type="clear" class="btn btn-secondary">Reset</button>
                <button type="sumbit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
</div>
