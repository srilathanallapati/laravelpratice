@extends('layout')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Edit Article</h2>
			</div>
            <form method="POST" action="{{route('articles.update', $article->id)}}" >   
				@csrf
                @method('PUT')
				<div class="form-group">
					<label for="title">Title</label>
					<input type="input" 
                    class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                    id="title" 
                    value="{{old('title', $article->title)}}" >
                    @error('title')	
						<p class="invalid-feedback">
							Please enter title.
						</p>
					@enderror					
				</div>
				<div class="form-group">
					<label for="excerpt">Excerpt</label>
					<textarea 
                    class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : ''}}" 
                    name="excerpt" 
                    id="excerpt" 
                    >{{old('excerpt', $article->excerpt)}}</textarea>
                    @if ($errors->has('excerpt'))
						<p class="invalid-feedback">
							Please enter excerpt.
						</p>
					@endif
				</div>
				<div class="form-group">
					<label for="body">Body</label>
					<textarea 
                    class="form-control @error('body') is-invalid @enderror" 
                    name="body" 
                    id="body" 
                    >{{old('body', $article->body)}}</textarea>
                    @error('body')	
                        <p class="invalid-feedback">
                            Please enter body.
                        </p>
					@enderror     
				</div>
				<div class="form-group">
					<label for="tags">Tags</label>
					<select 
					class="form-control @error('tags') is-invalid @enderror" 
					name="tags[]" 
					id="tags"					
					multiple >
					@foreach($tags as $tag)
						<option 
						value="{{$tag->id}}"
						{{ $article_tags->contains($tag->id) ? 'selected': ''  }} >
						 {{$tag->name}} 
						 </option>
					@endforeach
					</select> 
					@error('tags')	
						<p class="invalid-feedback">
							{{$errors->first('tags')}}
						</p>
					@enderror   
				</div>
				<button 
                type="submit" 
                class="btn btn-primary">
                Update
                </button>             
            </form>
		</div>
	</div>
</div>

@endsection
