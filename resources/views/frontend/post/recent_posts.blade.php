<div class="w-100 py-4">
    <h5 class="text-muted pb-2">Recent</h5>
    @foreach ($recent_posts as $recent_post)
        <div class="pb-3">
            <a href="{{ route('post.details', $recent_post->slug) }}" class="post_card">
                <p>{{ $recent_post->title }}</p>
                {{-- <span>06 November 2023</span> --}}
            </a>
        </div>
    @endforeach

</div>
