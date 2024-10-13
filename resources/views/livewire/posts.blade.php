<div>
    <div class="max-w-5xl mx-auto p-2 lg:p-5 space-y-8">
        @foreach($posts as $post)
            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                    <img class="w-80 h-60 object-cover"
                         src="{{ $post->image }}"
                         alt="Movie"/>
                </figure>
                <div class="card-body">
                    <p class="text-secondary text-xs">
                        @if($post->author)
                            Por
                            <a href="{{ route('posts', ['autor'=>$post->author->slug]) }}"
                               class="text-xs transition duration-500
                               ease-in-out">
                                {{ $post->author->name }}
                            </a>
                        @endif
                        | En <a href="{{ route('posts',
                                    ['categoria'=>$post->category->slug]) }}"
                                class="text-xs transition duration-500
                                        ease-in-out">
                            {{ $post->category->name }}
                        </a>
                    </p>

                    <h2 class="card-title">
                        {{ $post->title }}
                    </h2>

                    <p>
                        {!! Str::limit($post->content) !!}
                    </p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('post.show', $post->slug) }}"
                           class="btn btn-primary btn-sm">
                            Leer más
                        </a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
