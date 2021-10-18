@extends("blog.layouts.app")
@section("header")
    <x-BlogHeader isIndexPage=true;/>
@endsection
@section("content")
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
        <h2>Recientes publicaciones</h2>
            <p>Podras observar  las últimas publicaciones recien agregadas</p>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                   
                    <a href="/blog-details/{{$post->id}}" class="block-20" style="background-image: url(https://testblogsola.000webhostapp.com/images/{{$post->image}});">
                    </a>
                    <div class="text d-flex py-4">
                        <div class="meta mb-3">
                            <div>
                                <a href="#">
                                    {{date("y-m-d", strtotime($post->created_at));}}
                                </a>
                            </div>
                        </div>
                        <div class="desc pl-3">
                            <h3 class="heading"><a href="/blog-details/{{$post->id}}">{{$post->brief}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>   
        @endforeach
    </div>
@endsection