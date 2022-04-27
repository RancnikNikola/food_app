<!doctype html>

<title>Dishes</title>
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
            <div class="mt-8 md:mt-0 items-center">
                <a href="/dishes" class="text-xs font-bold uppercase">Dishes</a>
                <a href="/categories" class="text-xs font-bold uppercase">Categories</a>
                <a href="/ingredients" class="text-xs font-bold uppercase">Ingredients</a>
                <a href="/tags" class="text-xs font-bold uppercase">Tags</a>
            </div>
            <div class="mt-8 md:mt-0 flex items-center">
                
                @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Log out</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-6">Login</a>
                @endauth
                

                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        <header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                See all <span class="text-blue-500">Tags</span> 
            </h1>

            <div class="text-sm mt-8">
                <a href="dishes/create/newdish" class="bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Add tag
                </a>
            </div>

            <p class="text-sm mt-14">
                Another year. Another update. We're refreshing the popular Laravel series with new content.
                I'm going to keep you guys up to speed with what's going on!
            </p>

            
        </header>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            

            <div class="lg:grid lg:grid-cols-3">


                @foreach ($tags as $tag)
                <a href="/tags/{{ $tag->slug }}">
                            <article
                            class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                            <div class="py-6 px-5">
                                <div>
                                    <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
                                </div>

                                <div class="flex">
                                    <header>
                                        <div class="mt-2">
                                            <h1 class="text-xl">
                                                {{ $tag->name }}
                                            </h1>
                                        </div>
                                    </header>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
                
            </div>
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
