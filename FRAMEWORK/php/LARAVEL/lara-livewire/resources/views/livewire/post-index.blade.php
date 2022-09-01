<div>
    @foreach ($posts as $post)
        <div class="border border-gray-400 rounded-lg p-4">
            <h3 class="font-bold text-xl mb-4">
                <a href="#">
                    {{ $post->title }}
                </a>
            </h3>
            <p class="text-gray-700 text-base">
                {{ $post->content }}
            </p>
        </div>
    @endforeach
</div>
