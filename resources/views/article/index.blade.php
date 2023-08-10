@extends('layouts.app')
@section('title', $article_data['title'])
@section('author', 'Noumecha Spaker')
@section('description', 'Simple laravel blog about tech')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Organic Information</p>
					<h1>News Article</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="latest-new mt-150 mb-150">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-24">
            <div class="col-auto">
                <h1 class="h2">BLOG</h1>
            </div>
            <div class="col-auto">
                <form action="{{ route('article.index') }}" method="GET">
                    <div class="row align-items-center g-24">
                        <label for="word" class="col-md-auto pe-0 form-label mb-0">
                            SEARCH :
                        </label>
                        <div class="col-md-auto">
                            @if ($article_data['word'] !== "")
                                <input type="text" id="word" class="form-control" name="word" value="{{ $article_data['word'] }}">
                            @else
                                <input type="text" id="word" class="form-control" name="word" value="">
                            @endif
                        </div>
                        <label for="category" class="col-md-auto pe-0 form-label mb-0">
                            Categories :
                        </label>
                        <div class="col-md-auto">
                            <select class="form-control form-select" id="category" name="category">
                                <option value="0" selected>All</option>
                                @foreach ($article_data['categories'] as $category)
                                    @if ($article_data['category'] == $category->getId())
                                        <option value="{{ $category->getId() }}" selected>{{ $category->getName() }}</option>
                                    @else
                                        <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="tag" class="col-md-auto pe-0 form-label mb-0">
                            Tags :
                        </label>
                        <div class="col-md-auto">
                            <select class="form-control form-select" id="tag" name="tag">
                                <option value="0" selected>All</option>
                                @foreach ($article_data['tags'] as $tag)
                                    @if ($article_data['tag'] == $tag->getName())
                                        <option value="{{ $tag->getName() }}" selected>{{ $tag->getName() }}</option>
                                    @else
                                        <option value="{{ $tag->getName() }}">{{ $tag->getName() }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-auto">
                            <button class="submit btn btn-lg btn-primary" type="submit">
                                <span>SUBMIT</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="colCount">
            <p class="fs-5 mb-0">BoxBrownie.com’s team and other experts offer their best advice, insights, and how-to's. All to help you improve the presentation of your property marketing.</p>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- latest news -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row">
            @foreach($article_data['articles'] as $article)
			    <div class="col-lg-4 col-md-6">
				    <div class="single-latest-news">
				    	<a href="{{ route('article.show', ['id'=> $article->getId()]) }}">
                            <div style="background-image: url('{{ asset('/storage/'.$article->getImage()) }}')" class="latest-news-bg">
                                <!--img src="{#{ asset('img/'.$article->getImage()) }#}" alt="" class="card-img-top img-card"-->
                            </div>
                        </a>
				    	<div class="news-text-box">
				    		<h5>
                                {{ date("d M Y",strtotime($article->getCreatedAt())) }}
                            </h5>
				    		<h3>
                                <a href="{{ route('article.show', ['id'=> $article->getId()]) }}">
                                    {{ $article->getTitle() }}
                                </a>
                            </h3>
				    		<!--p class="blog-meta">
				    			<span class="author"><i class="fas fa-user"></i> Admin</span>
				    			<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
				    		</p-->
				    		<p class="text-justify excerpt">
                                {{ Str::limit($article->getContent(), $limit=300, $end="...") }}
                            </p>
				    		<a href="{{ route('article.show', ['id'=> $article->getId()]) }}" class="read-more-btn">
                                read more <i class="fas fa-angle-right"></i>
                            </a>
				    	</div>
				    </div>
			    </div>
            @endforeach
		</div>
        {{-- $article_data['articles']->links() --}}
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="pagination-wrap">
							<ul>
								<li>
                                    <a href="{{ $article_data['articles']->previousPageUrl() }}">Prev</a>
                                </li>
								<li>
                                    <a class="active" href="#">{{ $article_data['articles']->currentPage() }}</a>
                                </li>
								<li>
                                    <a href="{{ $article_data['articles']->nextPageUrl() }}">Next</a>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end latest news -->
<!-- logo carousel -->
<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end logo carousel -->
@endsection
