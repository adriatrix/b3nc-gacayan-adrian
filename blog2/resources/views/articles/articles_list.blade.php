@extends('layout/app')

@section('title')
Articles List
@endsection

@section('main_content')

<div class="columns">
   <div class="column is-8 is-offset-2">
      <button type="button" class="button is-primary" name="button" id="showModal">Create Article</button>
      <hr>
      <table class="table is-hoverable is-striped is-bordered is-fullwidth">
         <thead>
            <tr>
               <th>Title</th>
               <th>Created at</th>
               <th>Created by</th>
            </tr>
         </thead>
         <tbody>
            @foreach($articles as $article)
            <tr>
               <td><a href='{{url("/articles/$article->id")}}'>{{$article->title}}</a></td>
               <td><span class="is-7"> {{$article->created_at}}</span></td>
               <td><a href='{{url("/profile/".$article->get_user->id)}}'><small>{{$article->get_user->name}}</small></a></td>
            </tr>
            @endforeach
         </tbody>
      </table>

      <div class="modal">
         <div class="modal-background"></div>
         <div class="modal-card">
            <form class="" action="{{url("/articles/create")}}" method="post">
               <header class="modal-card-head">
                  <p class="modal-card-title">Add New Article</p>
                  <button class="delete" aria-label="close"></button>
               </header>
               <section class="modal-card-body">
                  {{ csrf_field() }}
                  <div class="field">
                     <label class="label" for="title">Title:</label><br>
                     <input class="input control" type="text" name="title"><br>
                  </div>
                  <div class="field">
                     <label class="label" for="content">Content:</label><br>
                     <div class="control">
                        <textarea class="textarea" name="content" rows="4" cols="18"></textarea><br>
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
