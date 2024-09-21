@extends('base.base')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-xl mx-auto py-24">
            @if (Session::has('message') && Session::get('alert-class') == 'success')
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    {{ Session::get('message') }}
                </div>
            @elseif(Session::has('message') && Session::get('alert-class') == 'failed')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <a href="{{ route('articles.create') }}">
                <x-button class="mb-3 inline-flex text-sm" color="blue">
                    <svg class="h-6 w-6 me-2 ms-1 text-orange-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                    Create Article
                </x-button>
            </a>
            @if ($articles->count() == 0)
                <h4 class="text-2xl text-gray-600 font-extrabold mb-3">No articles</h4>
            @endif
            @foreach ($articles as $item)
                <article class="prose lg:prose-xl py-3">
                    <div class="">
                        <form action="{{ route('articles.destroy', ['article' => $item->id]) }}" method="POST"
                            class="inline-flex no-underline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a href="{{ route('articles.edit', ['article' => $item->id]) }}" class="no-underline">
                            <button type="button"
                                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                        </a>
                        <a href="{{ route('articles.show', ['article' => $item->id]) }}" class="no-underline">
                            <h1>{{ $item->title }}</h1>
                        </a>
                    </div>
                    {!! $item->article !!}
                </article>
            @endforeach
        </div>
    </div>
@endsection
