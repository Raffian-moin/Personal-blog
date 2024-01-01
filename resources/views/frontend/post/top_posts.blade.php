@foreach ($top_posts as $top_post)
    <div>
        <a href="{{ route('post.details', $top_post->slug) }}" class="post_card">
            <p>{{ $top_post->title }}</p>
            {{-- <span>06 November 2023</span> --}}
        </a>
    </div>
@endforeach
