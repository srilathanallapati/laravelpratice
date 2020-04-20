@extends('layout')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            <div>
                <ul class="style1">
                    @forelse ($articles as $article)
                    <li class="first">
                        <h3><a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a></h3>
                        <p>{!! $article->excerpt !!}</p>
                    </li>

                    @empty
                    <p>No relevant articles found.</p>
                    @endforelse
                </ul>
            </div>
            @isset($articles->links)
             {{ $articles->links() }}
            @endisset
        </div>
    </div>
</div>    
@endsection    