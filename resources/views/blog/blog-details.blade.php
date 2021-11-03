@extends("blog.layouts.app")
@section("header-title")
    <p class="breadcrumbs">
        <span class="mr-2">
            <a href="/">Home</a>
        </span> 
        <span class="mr-2">
            <a href="/blog">Blog</a>
        </span> 
        <span>Blog Details</span>
    </p>
    <h1 class="mb-3 bread">{{($post->title)}}</h1>
@endsection
@section("header")
    <x-BlogHeader />
@endsection
@section("content")
    <div class="row">
        <div class="col-lg-8 ftco-animate">
          	<p>
        
              <img src="{{getUrl($post->image)}}" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">{{$post->title}}</h2>
            <p>
                {!!$post->content!!}
            </p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">{{$category->categoryName}}</a>
                </div>
            </div>
            <div class="pt-5 mt-5">
                <h3 class="mb-5">{{$comments->count()}} {{(" Comentarios")}}</h3>
                <ul class="comment-list">
                    @foreach($comments as $comment)
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{asset('blog-resources/images//unknown_male.jpg')}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->userName}}</h3>
                            <div class="meta">
                                {{date("y-m-d", strtotime($comment->created_at));}}
                               
                            </div>
                            <p>
                                {{$comment->comment}}
                            </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- END comment-list -->
                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Deja un comentario</h3>
                    <form method="POST" action="{{route('comment.store')}}"  class="p-5 bg-light" >
                        @csrf
                        <input type="hidden" name="postId" value="{{$post->id}}"> 
                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="text" class="form-control" name="userName" placeholder="Nombre" id="name" required value="{{old('userName')}}">
                            @error("userName")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" value="{{old('email')}}">
                            @error("email")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea id="message" cols="30" rows="10" class="form-control" name="comment" placeholder="Comentarios" required rows="3">{{old('comment')}}</textarea>
                            @error("comment")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <input type="submit" value="Enviar comentario" class="btn py-3 px-4 btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        <!--------categories---->
        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
                <form action="#" class="search-form">
                    <div class="form-group">
                        <span class="fa fa-search"></span>
                        <input type="text" class="form-control" placeholder="Escribe una palabra y presiona enter">
                    </div>
                </form>
            </div>
            <div class="sidebar-box ftco-animate">
                <div class="categories">
                    <h3>Catergorias</h3>
                    @foreach($categories as $category)
                        <li><a href="#">{{$category->categoryName}} <span class="fa fa-chevron-right"></span></a></li>
                    @endforeach
                   
                </div>
            </div>

            <div class="sidebar-box ftco-animate">
                <h3>Publicaciones recientes</h3>
                @foreach($lastPosts as $lastpost)
                    <div class="block-21 mb-4 d-flex">
                   
                        <a class="blog-img mr-4" style="background-image: url({{getUrl($lastpost->image)}});"></a>
                        <div class="text">
                            <h3 class="heading">
                                <a href="/blog-details/{{$lastpost->id}}">
                                    {{$lastpost->brief}}
                                </a>
                            </h3>
                            <div class="meta">
                                <div>
                                    <a href="#">
                                        <span class="fa fa-calendar"></span>
                                        {{date("y-m-d", strtotime($lastpost->created_at));}}
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <span class="fa fa-comment"></span> 
                                        0
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--------end categories---->
    </div>
    @include('sweetalert::alert')
@endsection

