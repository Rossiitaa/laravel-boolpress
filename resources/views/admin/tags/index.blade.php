@extends("layouts.app")

@section("title", "Tags Index")

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <th>ID</th>
                        <th>Tag Name</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>   
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="{{ route("admin.tags.show", $tag->id) }}" class="btn btn-sm btn-primary">View</a>
                                </td>
                                <td>
                                    <a href="{{ route("admin.tags.edit", $tag->id) }}" class="btn btn-sm btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection