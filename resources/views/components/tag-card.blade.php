@props(['tag'])

<article
                    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <a href="tags/{{ $tag->slug }}">
                        <div class="py-6 px-5">
                            <div>
                                <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
                            </div>
                
                            <div class="mt-8 flex flex-col justify-between">
                                <header>
                                    <div class="space-x-2">
                                        {{-- @foreach ($dish->tags as $tag)
                                            <x-dish-button :tag="$tag"/>
                                        @endforeach --}}
                                    </div>
                
                                    <div class="mt-4">
                                        <h1 class="text-3xl">
                                            {{ $tag->name }}
                                        </h1>
                
                                        {{-- <span class="mt-2 block text-gray-400 text-xs">
                                            {{ $dish->category->title }}
                                        </span> --}}
                                    </div>
                                </header>
                
                                <div class="text-sm mt-4">
                                    {{-- <p>
                                        {{ $dish->description }}
                                    </p> --}}
                                </div>
                
                                <footer class="flex justify-between items-center mt-8">
                                    <div class="flex items-center text-sm">
                                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                                        <div class="ml-3">
                                            {{-- <h5 class="font-bold">{{ $dish->user->name }}</h5> --}}
                                            <span class="mt-2 block text-gray-400 text-xs">
                                                Published <time>{{ $tag->created_at->diffForHumans() }}</time>
                                            </span>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </a>
                </article>