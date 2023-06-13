@extends('layouts.user_type.auth')

@section('content')

<br>
<br>
<div class="row">
  <div class="col-lg-8">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/curved-images/curved0.jpg');">
        <span class="mask bg-gradient-light"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h2 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff;">SEOPro Blog Editor</h2> <!-- Updated title with text shadow -->
          <p class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff;">Write engaging blogs with ease</p> <!-- Added subtitle with text shadow -->
          <form method="post" action="">
            <div class="text-center">
              <textarea class="editor col-lg-10 mx-auto" style="height: 400px;" name="blogContent"><?php echo isset($_POST['blogContent']) ? $_POST['blogContent'] : ''; ?></textarea>
              <br>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card h-100 p-3">
      <div class="row row-cols-2 row-cols-sm-3  g-2 ">
        @foreach(\App\Models\Keyword::getKeywords() as $keyword)
          <div class="col">
            <div class="card draggable-card" draggable="true" data-word="{{$keyword->word}}">
              <div class="card-body">
                <h6 class="mb-0 text-sm">{{$keyword->word}}</h6>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@if (isset($display))
  <div style="white-space: pre-line">
    <p class="mb-0">{{$display}}</p>
  </div>
@endif

<script>
  // Drag and drop functionality
  const draggableCards = document.querySelectorAll('.draggable-card');
  const textarea = document.querySelector('.editor');

  draggableCards.forEach(card => {
    card.addEventListener('dragstart', handleDragStart);
  });

  textarea.addEventListener('dragover', handleDragOver);
  textarea.addEventListener('drop', handleDrop);

  function handleDragStart(event) {
    event.dataTransfer.setData('text/plain', event.target.dataset.word);
  }

  function handleDragOver(event) {
    event.preventDefault();
  }

  function handleDrop(event) {
  event.preventDefault();
  const word = event.dataTransfer.getData('text/plain');
  textarea.value += word + ' ';
}

</script>

@endsection
