@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
<section id="main" class="clearfix">
    <div id="content-container" style="margin-left: 4rem;">
        <div id="filters" class="clearfix">
            <a href="{{ route('blogs.index')}}">
                <button type="button" class="" data-goto="/normandie/seine-maritime">
                    <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i>
                    <span>Retour</span>
                </button>
            </a>
            <form
                id="filter-search"
                action="https://www.echange-service.com/communaute"
                method="post"
            >
                <input
                    type="text"
                    name="search"
                    value=""
                    id="search"
                    placeholder="Rechercher dans ..."
                    minlength="3"
                    maxlength="30"
                    class="marg-r-XXS"
                />
                <button type="submit" name="form_search" class="">
                    <i class="lni-search vertical-middle"></i>
                </button>
                <button type="submit" name="form_clear_search">
                    <i class="lni-close vertical-middle"></i>
                </button>
            </form>
        </div>
        <div id="profile-content" class="clearfix" class="mt-4 mb-4 ml-32">
        <div>
                    <div class="">
                        <p><strong class="text-color1">Titre: </strong> {{ $blog->title }}</p>
                    </div>
                </div>
            <div id="profile-provide" class=" flex flex-col justify-center items-center py-8">
            <div class="mt-12 mb-12 ml-32 d-flex justify-content-center items-center py-8">
    <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->image }}" style="max-width: 100%; height: auto; margin: 0 auto; display: block;" />
</div>


                
            </div>
        </div>
        <div class="mt-4">
            <strong class="text-color1">Description: </strong>
            <p>{{ $blog->content }}</p>
        </div>
        <div class="mt-4">
    <strong class="text-color1">Commentaires:</strong>
    <ul>
    @foreach($blog->comments as $comment)
    <li class="comment-item">
        <div class="comment-info">
            <img src="{{ $comment->user->profile_photo_url }}" alt="User Image">
        </div>
        <div class="comment-details">
            <div class="comment-header">
                <span class="comment-username">{{ $comment->user->name }}</span>
                <span class="comment-date">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="comment-content" id="comment-{{ $comment->id }}">{{ $comment->content }}</div>
        </div>
        @can('update', $comment)
        <button type="submit"class="edit-comment" data-comment-id="{{ $comment->id }}">
    &#9998; 
    </button>

            <form class="edit-comment-form" id="edit-comment-{{ $comment->id }}" data-comment-id="{{ $comment->id }}" style="display: none;">
                <input type="text" class="edit-comment-input" value="{{ $comment->content }}">
                <button type="submit" class="edit-comment-submit">Enregistrer</button>
            </form>
            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">&#128465;</button>
</form>




        @endcan
    </li>
@endforeach




    </ul>
</div>

<form action="{{ route('comments.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="content" class="text-color1">Contenu du commentaire:</label>
        <input name="content" id="content" class="form-control" required />
        <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
        <button type="submit" class="btn btn-primary" class="text-color1">Publier le commentaire</button>
    </div>
</form>

        <ins
            class="adsbygoogle"
            style="display: block; width: 100%; margin: 20px 0 30px 0"
            data-ad-layout="in-article"
            data-ad-format="fluid"
            data-ad-client="ca-pub-0184352842429596"
            data-ad-slot="6520630379"
        ></ins>
        <a href="{{ route('blogs.index')}}">
            <button type="button" class="marg-t" data-goto="/normandie/seine-maritime">
                <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i><span>Retour</span>
            </button>
        </a>
    </div>
</section>
<script type="text/javascript" src="{{asset('assets/frontoffice/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/ES.EchangeService.1.css.css')}}"/>
<script type="text/javascript" src="{{asset('assets/frontoffice/js/generate/ES.EchangeService.1.js.php')}}"></script>
<link href="../../../cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet"/>
<script src="{{asset('assets/frontoffice/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontoffice/js/ponyfill/ponyfill.js')}}"></script>
<script type="text/javascript">
    var gaJsHost =
        "https:" == document.location.protocol ? "https://ssl." : "http://www.";
    document.write(
        unescape(
            "%3Cscript src='" +
            gaJsHost +
            "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"
        )
    );
</script>
<script type="text/javascript">
    try {
        var pageTracker = _gat._getTracker("UA-7375850-1");
        pageTracker._trackPageview();
    } catch (err) {}
</script>
<script>
    $("document").ready(function () {
        var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);
        $(".adsbygoogle").each(function () {
            adsbygoogle.push(this);
        });
    });
</script>

<script>
$(document).ready(function () {
    $('.edit-comment').on('click', function (e) {
        e.preventDefault();
        var commentId = $(this).data('comment-id');
        $('#comment-' + commentId).hide();
        $('#edit-comment-' + commentId).show();
    });

    $('.edit-comment-form').on('submit', function (e) {
    e.preventDefault();
    var commentId = $(this).data('comment-id');
    var newContent = $('#edit-comment-' + commentId + ' .edit-comment-input').val();

   
});

});
</script>
@endsection
