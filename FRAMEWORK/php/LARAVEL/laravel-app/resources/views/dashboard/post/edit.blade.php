@extends('dashboard.layouts.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit post</h1>
</div>

<div class="col-lg-8">

    <form method="post" action="/dashboard/posts/{{$post->slug}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title', $post->title)}}" autofocus required>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{old('slug', $post->slug)}}" required>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" aria-label="" name="category_id">
                @foreach($categories as $c)
                @if(old('category_id', $post->category_id) == $c->id)
                <option value="{{$c->id}}" selected>{{$c->name}}</option>
                @else
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endif
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label  @error('image') is-invalid @enderror">File Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if($post->image)
            <img src="{{asset('storage/' . $post->image)}}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control" type="file" name="image" id="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label"> Body </label>
            @error('body')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{old('body', $post->body)}}">
            <trix-editor input="body">
            </trix-editor>
        </div>


        <button type="submit" class="btn btn-primary">Create post</button>
    </form>

</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');


    title.addEventListener('change', function(e) {
        fetch('/dashboard/posts/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug);
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

@endsection
