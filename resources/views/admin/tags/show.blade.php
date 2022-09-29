@extends("layouts.app")

@section("title", "Tags Show")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="card-title text-center border-2 rounded-2">
                            <h4></h4>
                            <h2>
                                {{ $tag->name }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @forelse ($tag->posts as $post)
                <div class="card col-8 p-2 my-3">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h2>
                                <a href="{{ route('admin.posts.show', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                        </div>
                        <div class="card-image text-center my-2">
                            <img src="{{ $post->image }}" class="w-50" alt="">
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
@endsection