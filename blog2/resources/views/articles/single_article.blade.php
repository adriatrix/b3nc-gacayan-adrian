@extends('layout/app')

@section('title')
  {{$article->title}}
@endsection

@section('main_content')

   <div class="columns">
      <div class="column is-8 is-offset-2">
         <div class="columns">
            <div class="column">
               @if (count($errors) > 0)
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
               </ul>
               @endif
            </div>
         </div>
         <div class="columns">
            <div class="column">
               <div class="columns">
                  <div class="column is-9">
                     <h1 class="title">{{$article->title}}</h1>
                     <h2 class="subtitle">
                        @if($article->updated_at != null)
                        {{$article->updated_at->diffForHumans()}}
                        @else
                        {{$article->updated_at}}
                        @endif
                     </h2>
                  </div>
                  <div class="column is-3">
                     <form action='{{url("/articles/$article->id/delete")}}' method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <div class="buttons has-addons is-pulled-right">
                           <button type="button" class="button is-info" id="showModal">Edit</button>
                           <button type="submit" class="button is-danger" name="button">Delete</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <p>{{$article->content}}</p>
         <hr>

         @foreach($article->comments as $comment)
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>{{$comment->get_user->name}}</strong>
                    <br>
                    {{$comment->comment}}
                    <br>
                    <small>
                       @if($comment->updated_at != null)
                       {{$comment->updated_at->diffForHumans()}}
                       @else
                       {{$comment->updated_at}}
                       @endif
                    </small>
                  </p>
                </div>
              </div>
            </article>
         @endforeach
         <article class="media">
           <div class="media-content">
             <form class="" action='{{url("/articles/$article->id/comment")}}' method="post">
             <div class="field">
               <p class="control">
                 <textarea name="comment" class="textarea" placeholder="Add a comment..."></textarea>
               </p>
             </div>
             <div class="field">
               <p class="control">
                  {{ csrf_field() }}
                  <input class="button" type="submit" name="submit" value="Post Comment">
               </p>
             </div>
             </form>
           </div>
         </article>
      </div>
   </div>


  <div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <form class="" action='{{url("/articles/$article->id/edit")}}' method="post">
      <header class="modal-card-head">
        <p class="modal-card-title">Edit Article</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
          {{ csrf_field() }}
          <div class="field">
            <label class="label" for="title">Title:</label><br>
            <input class="input control" type="text" name="title" value="{{$article->title}}"><br>
          </div>
          <div class="field">
            <label class="label" for="content">Content:</label><br>
            <div class="control">
              <textarea class="textarea" name="content" rows="4" cols="18">{{$article->content}}</textarea><br>
            </div>
          </div>
      </section>
      <footer class="modal-card-foot">
        <input class="button is-link" type="submit" name="submit" value="Save">
        <button class="button is-danger cancel">Cancel</button>
      </footer>
    </form>
    </div>
  </div>

  <script>
      document.querySelector('#showModal').addEventListener('click', function(event) {
        event.preventDefault();
        var modal = document.querySelector('.modal');  // assuming you have only 1
        var html = document.querySelector('html');
        modal.classList.add('is-active');
        html.classList.add('is-clipped');

        modal.querySelector("button.delete").addEventListener('click', function(e) {
          e.preventDefault();
          modal.classList.remove('is-active');
          html.classList.remove('is-clipped');
        });

        modal.querySelector("div.modal-background").addEventListener('click', function(e) {
          e.preventDefault();
          modal.classList.remove('is-active');
          html.classList.remove('is-clipped');
        });

        modal.querySelector("button.cancel").addEventListener('click', function(e) {
          e.preventDefault();
          modal.classList.remove('is-active');
          html.classList.remove('is-clipped');
        });
      });
  </script>
@endsection
