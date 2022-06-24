@extends('layouts.base')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">{{ $post->created_at->translatedFormat('F') .' '. $post->created_at->day .', '. $post->created_at->year.', '. $post->comments->count() }} Комментариев</p>
            <section class="blog-post-featured-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    {!! $post->content !!}
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3 ">
                        <form action="{{ route('posts.like.store', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                @auth()
                                    <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                @endauth
                            </button>
                        </form>
                    </section>
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4 aos-init" data-aos="fade-up">Похожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4 aos-init" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <a href="{{ route('posts.show', $relatedPost->id) }}">
                                            <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment-list mb-5">
                        <h2 class="section-title" data-aos="fade-up">Комментарии</h2>
                        @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                                <div>
                                    {{ $comment->user->name }}
                                </div>
                                <span class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                {{ $comment->content }}
                            </span>
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5 aos-init" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('posts.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12 aos-init" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Комментарий</label>
                                    <textarea name="content" id="comment" class="form-control" placeholder="Комментарий" rows="10">

                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 aos-init" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
