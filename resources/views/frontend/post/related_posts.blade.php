<section class="border-top pt-4">
    <h3>Related Posts</h3>

    <div class="row g-4">
        @foreach ($related_posts as $related_post)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('post.details', $related_post->slug) }}" class="post_card">
                    <img src="../assets/images/GTA-6.webp" alt="">
                    <p>{{ $related_post->title }}</p>
                    <span>{{ date_format($related_post->created_at, "j F Y")  }}</span>
                </a>
            </div>
        @endforeach
        
    </div>
</section>
