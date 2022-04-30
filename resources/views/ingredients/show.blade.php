<x-layout>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        
        <div class="lg:grid lg:grid-cols-3">

            @foreach ($ingredient->dishes as $idish)
            <a href="/dishes/{{ $idish->slug }}">
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
                                        {{ $idish->title }}
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

</x-layout>