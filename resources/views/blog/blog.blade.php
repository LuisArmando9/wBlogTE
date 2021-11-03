
@extends("blog.layouts.app")
@section("header-title")
    <p class="breadcrumbs">
        <span class="mr-2">
            <a href="/">Home</a>
        </span>
        <span class="mr-2">
            <a href="/blog">Blog</a>
        </span>
    </p>
    <h1 class="mb-3 bread">{{('BLOG')}}</h1>
@endsection
@section("header")
    <x-BlogHeader />
@endsection
@section("content")
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 ftco-animate">
				<div class="blog-entry">
					<a href="/blog-details/{{$post->id}}" class="block-20" style="background-image: url({{getUrl($post->image)}});"></a>
					<div class="text d-flex py-4">
						<div class="meta mb-3">
                            <div>
                                <a href="#"> {{date("y-m-d", strtotime($post->created_at));}}</a>
                            </div>
                            <div>
                                <a href="#">{{$post->categoryName}}</a>
                            </div>
                            <div>
                                <a href="#" class="meta-chat"><span class="icon-chat"></span>{{$post->title}}</a></div>
                        </div>
                        <div class="desc pl-3">
                            <h3 class="heading"><a href="#">{{$post->brief}}</a></h3>
                        </div>
					</div>
				</div>
          	</div>
        @endforeach

    </div>
    <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
                {{$posts->links()}}
            </div>
          </div>
    </div>
@endsection
