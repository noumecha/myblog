{{ var_dump($comments) }}
@foreach($comments as $comment)
    <div class="single-comment-body" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="comment-user-avater">
            <img src="assets/img/avaters/avatar1.png" alt="">
        </div>
        <div class="comment-text-body">
            <h4>{{ $comment->user->name }}<span class="comment-date">{{ $comment->getUpdatedAt() }}</span> <a href="#">reply</a></h4>
            <p>{{ $comment->getContent() }}</p>
        </div>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <!--p>
                <input type="text" placeholder="Your Name">
                <input type="email" placeholder="Your Email">
            </p-->
            <p><input type="hidden" name="article_id" value="{{ $article_data['article']->getId() }}"></p>
            <p><input type="hidden" name="parent_id" value="{{ $comment->getId() }}"></p>
            <p><textarea name="content" id="content" cols="30" rows="10" placeholder="Your Message"></textarea></p>
            <p><input type="submit" value="Submit"></p>
        </form>
        <div class="single-comment-body child">
            @include('article.comment', ['comments' => $comment->replies()])
            <!--div class="comment-user-avater">
                <img src="assets/img/avaters/avatar3.png" alt="">
            </div-->
            <!--div class="comment-text-body">
                <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
                <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
            </div-->
        </div>
    </div>
@endforeach
</div>
