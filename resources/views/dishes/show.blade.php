<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>

                <a href="#"
                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe
                    for Updates</a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>1 day ago</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $dish->user->name }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/dishes"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Dishes
                        </a>

                        <div class="space-x-2">
                            @foreach ($dish->tags as $tag)
                                <a href="#"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                       {{ $dish->title }}
                       <span class="mt-2 block text-gray-400 text-xs">
                        {{ $dish->category->title }}
                    </span>
                    </h1>
                    

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <h2 class="font-bold text-lg">Ingredients</h2>
                        <ul>
                                @foreach ($dish->ingredients as $ingredient)
                                    <li>{{ $ingredient->title }}</li>
                                @endforeach
                        </ul>

                        <h2 class="font-bold text-lg">Description</h2>

                        <p>{{ $dish->description }}</p>

                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">


                    <form method="POST" action="/dishes/{{ $dish->slug }}/comments" class="border border-gray-200 p-6 rounded-xl">
                        @csrf

                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/40" alt="" width="40" height="40" class="rounded-full">
                            <h2 class="ml-5">Leave a comment</h2>
                        </header>

                        <div class="mt-6">
                            <textarea class="w-full text-sm focus:outline-none focus:ring" placeholder="Write your comment here" name="body" rows="5"></textarea>
                        </div>
                        <div class="flex justify-end mt-6 pt-6 border-top border-gray-200 pt-6">
                            <button 
                            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                            type="submit">Post</button>
                        </div>
                    </form>

                    @foreach ($dish->comments as $comment)
                        <article class="flex bg-gray-100 p-6 border rounded-xl border-gray-200 space-x-4">
                            <div class="flex-shrink-0">
                                <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60" height="60" class="rounded-xl">
                            </div>
                            <div>
                                <header class="mb-4">
                                    <h3 class="font-bold">{{ $comment->user->username }}</h3>
                                    <p class="text-xs">Posted <time>2 months ago</time>
                                </header>

                                <p>
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </article>
                    @endforeach

                </section>
            </article>
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
