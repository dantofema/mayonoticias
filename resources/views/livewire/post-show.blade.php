<div>
    <div class="max-w-screen-xl mx-auto p-2 lg:p-5">
        <div class="rounded overflow-hidden flex flex-col mx-auto">
            <a href="{{ route('post.show', $post->slug) }}">
                <img class="w-full max-h-128 object-cover rounded"
                     src="{{ $post->image }}"
                     alt="{{ $post->title }}">
            </a>

            <article class="prose-lg lg:prose-2xl relative -mt-12 lg:-mt-24 p-2
            lg:p-10 lg:py-5 py-2 bg-base-100 mx-2 lg:mx-8 rounded">
                <h1>{{ $post->title }}</h1>
                <p class="mt-5 text-neutral text-xs">
                    @if($post->author)
                        Por
                        <a href="{{ route('posts', ['autor'=>$post->author->slug])
                     }}"
                           class="text-xs text-primary transition duration-500 ease-in-out">
                            {{ $post->author->name }}
                        </a>
                    @endif
                    | En <a href="{{ route('posts',
                ['categoria'=>$post->category->slug]) }}"
                            class="text-xs text-primary transition duration-500 ease-in-out">
                        {{ $post->category->name }}
                    </a>
                </p>
                <div>
                    {!! $post->content !!}
                </div>
            </article>

        </div>

    </div>
</div>
