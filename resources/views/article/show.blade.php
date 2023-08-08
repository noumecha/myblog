@extends('layouts.app')
@section('title', $article_data['title'])
@section('author', 'Noumecha Spaker')
@section('description', 'Simple laravel blog about tech')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Read the Details</p>
					<h1>{{ $article_data['article']->getTitle() }}</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="single-article-section">
					<div class="single-article-text">
						<div class="single-artcile-bg" style="background-image: url('{{ asset('/storage/'.$article_data['article']->getImage()) }}')"></div>
						<!--p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i> Admin</span>
							<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
						</p-->
						<h2>{{ $article_data['article']->getTitle() }}</h2>
						<p class="text-justify">
							{{ $article_data['article']->getContent() }}
						</p>
					</div>
                    <!-- Comments goes here
                        ####################
                        ####################
                    -->
                    <div class="comments-list-wrap">
                        <h3 class="comment-count-title">3 Comments</h3>
                        <div class="comment-list">
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                                <div class="single-comment-body child">
                                    <div class="comment-user-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @guest
                        <div class="comment-template">
                            <h4>Leave a comment</h4>
                            <p>you need to <a href="/login">Log In</a> before commment</p>
                            <a class="btn btn-outline-primary btn-lg" role="button" type="submit" href="/login">
                                login
                            </a>
                        </div>
                    @else
                        <div class="comment-template">
                            <h4>Leave a comment</h4>
                            <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                            <form action="index.html">
                                <p>
                                    <input type="text" placeholder="Your Name">
                                    <input type="email" placeholder="Your Email">
                                </p>
                                <p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
                                <p><input type="submit" value="Submit"></p>
                            </form>
                        </div>
                    @endguest
                    <!-- End Comments -->
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-section">
					<div class="recent-posts">
						<h4>Recent Posts</h4>
						<ul>
                            @foreach ($article_data['articles'] as $art)
                                @if($art->getTitle() == $article_data['article']->getTitle())

                                @else
                                    <li style="text-transform: uppercase;"><a href="/articles/{{ $art->getId() }}">{{ $art->getTitle() }}</a></li>
                                @endif
                            @endforeach
						</ul>
					</div>
					<!--div class="archive-posts">
						<h4>Archive Posts</h4>
						<ul>
							<li><a href="single-news.html">JAN 2019 (5)</a></li>
							<li><a href="single-news.html">FEB 2019 (3)</a></li>
							<li><a href="single-news.html">MAY 2019 (4)</a></li>
							<li><a href="single-news.html">SEP 2019 (4)</a></li>
							<li><a href="single-news.html">DEC 2019 (3)</a></li>
						</ul>
					</div-->
					<div class="tag-section">
						<h4>Tags</h4>
                        <!-- h4>{#{ var_dump($article_data['tags']) }}</h4-->
						<ul>
                            @foreach($article_data['tags'] as $tag)
							    <li><a href="#">{{ $tag }}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single article section -->
@endsection
