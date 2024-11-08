<x-guest-layout>
    <a class="text-gray-500 flex items-center group gap-1 mb-2" href="{{ url()->previous() }}">
        <x-fas-arrow-left-long class="h-4 w-6 pl-2 group-hover:pr-2 group-hover:pl-0" />
        <div class="group-hover:text-bolder group-hover:text-black">retour</div>
    </a>
    <img class="object-cover w-full max-h-96" src="{{ Storage::url($article->img_path) }}" alt="illustration de l'article">
    <h1 class="font-bold text-xl my-4">{{ $article->title }}</h1>
    <div class="mb-4 text-xs text-gray-500">
        {{ $article->published_at }}
    </div>
    <div>
        {!! \nl2br($article->body) !!}
    </div>
</x-guest-layout>
