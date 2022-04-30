<x-layout>
    @include('_dishes-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        

        <div class="lg:grid lg:grid-cols-3">


            @foreach ($categories as $category)
                    
                <x-category-card :category="$category"/>

            @endforeach
            
        </div>
    </main>
</x-layout>
        
