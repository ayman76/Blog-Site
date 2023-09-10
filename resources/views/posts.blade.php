@extends('components.layout')

@section('content')
    @include('posts_header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @include('components.post_featured')

        <div class="lg:grid lg:grid-cols-2">
            @include('components.post_card')
            @include('components.post_card')
        </div>

        <div class="lg:grid lg:grid-cols-3">
            @include('components.post_card')
            @include('components.post_card')
            @include('components.post_card')


        </div>
    </main>

    {{-- @section('header')
    <h1> Blogs </h1>
@endsection

@section('content')
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }} ">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                By <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}
                </a>
            </p>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach --}}
@endsection
