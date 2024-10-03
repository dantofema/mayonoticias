<div class="max-w-screen-xl mx-auto p-5">
    <div class="rounded overflow-hidden flex flex-col max-w-xl mx-auto">
        <a href="{{ route('post.show', $post->slug) }}">
            <img class="w-full h-80 object-cover duration-500 hover:scale-110"
                 src="{{ $post->image }}"
                 alt="{{ $post->title }}">
        </a>
        <div class="relative -mt-24 px-10 pt-5 pb-5 bg-white m-10">
            <a href="{{ route('post.show', $post->slug) }}"
               class="font-semibold text-lg inline-block
               hover:text-indigo-600 transition duration-500 ease-in-out
               mb-2">{{ $post->title }}</a>
            <p class="text-gray-500 text-sm">
                {!! Str::limit($post->content) !!}
            </p>
            <p class="mt-5 text-gray-600 text-xs">
                @if($post->author)
                    Por
                    <a href="{{ route('author.posts', $post->author->slug) }}"
                       class="text-xs text-indigo-600 transition duration-500 ease-in-out">
                        {{ $post->author->name }}
                    </a>
                @endif
                | En <a href="{{ route('category.posts', $post->category->slug)
                 }}"
                        class="text-xs text-indigo-600 transition duration-500 ease-in-out">
                    {{ $post->category->name }}
                </a>
            </p>
        </div>

    </div>

</div>