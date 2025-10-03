<section style="min-height:100vh; color:#1f2937; padding:40px 24px;">
    <div style="max-width:1200px; margin:0 auto;">
        <div class="flex items-center justify-between">
            <h2 style="font-size:28px; font-weight:700; margin-bottom:28px;">Latest Posts</h2>
            @auth
                <a href="{{ route('posts.form') }}"
                    style="background:#3b82f6; color:#fff; padding:8px 16px; border-radius:8px; text-decoration:none; font-weight:500; transition:background 0.3s;">
                    Create Post
                </a>
            @endauth
        </div>
        @if($posts->count())
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:24px;">
                @foreach($posts as $post)
                    <article
                        style="background:#fff; border-radius:16px; box-shadow:0 4px 6px rgba(0,0,0,0.1); padding:24px; transition:box-shadow 0.3s; display:flex; flex-direction:column; justify-content:space-between; min-height:350px;">
                        @if($post->image)
                            <img src="{{ env('R2_URL') . '/' . $post->image }}" alt="Post Image"
                                style="width:100%; border-radius:12px; margin-bottom:12px; max-height:250px; object-fit:cover;">
                        @else
                            <p class="flex items-center justify-center"
                                style="background: #6b7280; color:#fff; padding:4px 8px; border-radius:8px; height: 100%; font-size: 28px; font-weight: 500;">
                                There is no image</p>
                        @endif
                        <div style="margin-top: 20px;">
                            <h3 style="font-size:20px; font-weight:600; margin-bottom:12px;">{{ $post->title }}</h3>
                            <p style="font-size:16px; margin-bottom:12px; line-height:1.5;">{{ $post->description }}</p>
                            <p style="margin: 10px 0px;">Category Name: {{ $post->category->name }}</p>
                            @if(Auth::user()?->role === 'admin')
                                <div class="flex justify-between items-center">
                                    <form method="get" action="{{ route('post.show', $post->id) }}">
                                        <button
                                            style="background-color: blue; padding: 10px 16px; border-radius: 8px; border: none; cursor: pointer; color: white;"
                                            type="submit">Edit Post</button>
                                    </form>
                                    <form method="POST" action="{{ route('post.delete', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            style="background-color: red; padding: 10px 16px; border-radius: 8px; border: none; cursor: pointer; color: white;"
                                            type="submit">Delete Post</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <div style="margin-top: 50px;">
                {{ $posts->links() }}
            </div>
        @else
            <p style="color:#6b7280;">No posts available yet.</p>
        @endif
    </div>
</section>