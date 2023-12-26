<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    {{-- additional stylesheet --}}
    @stack('stylesheet')
</head>

<body>

    {{-- Navbar --}}
    @include('frontend.navbar')

    <header class="container py-4 border-bottom">
        <p>Categories</p>
        @foreach($categories as $category)
            <a href={{ route('categories.slug', $category->slug) }} class="btn btn-light btn-outline-secondary mb-1">{{ $category->name }}</a>
        @endforeach
    </header>

    <main class="py-4">
        <section class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div>
                        <a href={{ route('posts.key', 'recent') }} class="btn btn-outline-dark">Recent</a>
                        <a href={{ route('posts.key', 'top') }} class="btn btn-outline-dark">Top</a>
                    </div>
                </div>

                @foreach($posts as $post)
                    <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                        <a href="./pages/post-details.html" class="post_card">
                            <img src="https://roar.media/wp-content/uploads/2023/11/9-1536x803.jpg" alt="">
                            <p>{{ $post->title }}</p>
                            <span>{{ $post->created_at }}</span>
                        </a>
                    </div>
                @endforeach

            </div>

        </section>
    </main>

    {{-- Footer --}}
    @include('frontend.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- additional scripts --}}
    @stack('scripts')
</body>

</html>
