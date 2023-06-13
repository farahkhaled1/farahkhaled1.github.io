@extends('layouts.user_type.auth')

@section('content')

<br>
<br>
<div class="row">
  <div class="col-lg-8">
    <div class="card h-10 p-3">
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
    @if (!empty($outputText)) <!-- Added this section -->
  <div style="white-space: pre-line">
    <h4>Retrieved keywords:</h4>
    <p id="typewriter">{{$outputText}}</p>
  </div>
@endif

{{-- @if (isset($sendSentence))
                  
<div style="white-space: pre-line">  <p class="mb-0">{{$sendSentence}}</p> </div>

@endif --}}

    <h4 class="text-center mb-1" style="text-shadow: 2px 2px 4px #ffffff;">Based on your recent search...</h4> 
    <h6 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff;">These are the best keywords to use in your blog</h6> 

    <div class="card h-100 p-3">
      <div class="row row-cols-2 row-cols-sm-3 g-2 ">

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


   const sentenceElement = document.getElementById('typewriter');
  const sentence = sentenceElement.innerHTML;
  sentenceElement.innerHTML = '';

  let i = 0;
  const speed = 50; // Adjust the speed of typing

  function typeWriter() {
    if (i < sentence.length) {
      sentenceElement.innerHTML += sentence.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }

  typeWriter();
</script>

@endsection
