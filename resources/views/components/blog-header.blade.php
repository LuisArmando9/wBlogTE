
@if($isIndexPage)
	<div class="hero-wrap js-fullheight">
		<div class="overlay"></div>
		<div class="container-fluid px-0">
			<div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-start">
				<img class="one-third js-fullheight align-self-end order-md-first img-fluid" src="{{asset('blog-resources/images/towels.svg')}}" alt="">
				<div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
					<div class="text mt-5">
						<span class="subheading">Blog</span>
						<h1 class="mb-3"><span>Bienvenido,</span> <span>BLOG SOLÁ TEXTIL</span></h1>
						<p>Te invitamos a leer noticias, notas y más...</p>
						<p><a href="#" class="btn btn-secondary px-4 py-3">Explorar</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="hero-wrap hero-wrap-2" style="background-image: url({{asset('blog-resources/images/blog_2.jpg')}});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
			<div class="col-md-8 ftco-animate text-center text-md-left mb-5">
				@yield("header-title")
			</div>
			</div>
		</div>
    </div>
@endif