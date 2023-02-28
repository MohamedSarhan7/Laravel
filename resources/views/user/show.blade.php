<x-layout>
    <x-slot:title>
        ITI - Laravel
        </x-slot>


</x-layout>

<div class="d-flex justify-content-start p-5">
    <a href="{{ route('user.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>
<div class="d-flex justify-content-center p-5">

    <div class="d-flex flex-column  justify-content-center  w-75 ">


        <div class="card">
            <div class="card-header fs-3 ">
                User
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h3> {{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                    <footer class="blockquote-footer">
                    </footer>
                </blockquote>
            </div>
        </div>




        <div class="mt-3">
            <table class="table  table-primary  ">
                <thead class="">
                    <th class="col-1">id</th>
                    <th class="col-2">Title</th>
                    <th class="col-4">Content</th>
                    <th class="col-2">Created At</th>
                    <th class="col-4">Action</th>
                </thead>
                <tbody>
                    @foreach ($user->posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>

                            <td class="m-5">
                                <div class="d-flex flex-row justify-content-around">
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-info col-4">
                                        View
                                    </a>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary col-4">
                                Edit
                            </a>
                            <form class="col-4" action="{{ route('post.delete', $post->id) }}" method="user">
                                @method('DELETE')
                                @csrf()
                                <button type="submit" class="btn btn-danger w-100">Delete </button>
                            </form>

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




    </div>
</div>

</div>
