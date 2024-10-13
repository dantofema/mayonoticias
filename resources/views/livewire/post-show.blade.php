<div>
    <div class="max-w-screen-xl mx-auto p-5">
        <div class="rounded overflow-hidden flex flex-col mx-auto">
            <a href="{{ route('post.show', $post->slug) }}">
                <img class="w-full max-h-128 object-cover rounded"
                     src="{{ $post->image }}"
                     alt="{{ $post->title }}">
            </a>

            <article class="prose-2xl relative -mt-24 px-10 pt-5 pb-5 bg-white
            m-10 rounded">
                <h1>{{ $post->title }}</h1>
                <p class="mt-5 text-gray-600 text-xs">
                    @if($post->author)
                        Por
                        <a href="{{ route('posts', ['autor'=>$post->author->slug])
                     }}"
                           class="text-xs text-indigo-600 transition duration-500 ease-in-out">
                            {{ $post->author->name }}
                        </a>
                    @endif
                    | En <a href="{{ route('posts',
                ['categoria'=>$post->category->slug]) }}"
                            class="text-xs text-indigo-600 transition duration-500 ease-in-out">
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
