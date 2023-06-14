@extends('layouts.user_type.auth')

@section('content')


<div class="row">
  <div class="col-lg-8">
    <div class="card h-10 p-3">
      <h2 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;">SEOPro Blog Editor</h2>
      <p class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 18px;">Write engaging blogs with ease</p>

      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/curved-images/curved0.jpg');">
        <span class="mask bg-gradient-light"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <form method="post" action="">
            <div class="text-center">
            
              <textarea class="editor col-lg-10 mx-auto" style="height: 400px; width:700px; font-family: 'Arial', sans-serif; font-size: 16px; border-radius: 8px; padding: 10px; border: 1px solid #ccc;" name="blogContent" id="blogContent">   
                @if (!empty($outputText))
                {{$outputText}}
                @endif
                <?php echo isset($_POST['blogContent']) ? $_POST['blogContent'] : ''; ?></textarea>
              <br>
              <br>
              <button type="button" class="btn btn-success" style="font-family: 'Arial', sans-serif; font-size: 12px; border-radius: 5px; padding: 14px 20px; float: right;">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <h4 class="text-center mb-1" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">Based on your recent search...</h4>
    <h6 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 16px;">These are the best keywords to use in your blog</h6>
    <div class="card h-100 p-3">
      <div class="row row-cols-2 row-cols-sm-3 g-2">
        @foreach(\App\Models\Keyword::getKeywords() as $keyword)
        <div class="col">
          <div class="card draggable-card" draggable="true" data-word="{{$keyword->word}}">
            <div class="card-body">
              <h6 class="mb-0 text-sm" style="white-space: nowrap; ">{{$keyword->word}}</h6>
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

  // Typewriter effect
  const sentenceElement = document.getElementById('blogContent');
  let sentence = sentenceElement.innerHTML.trim();
  sentenceElement.innerHTML = '';

  let i = 0;
  const speed = 14; // Adjust the speed of typing

  function typeWriter() {
    if (i < sentence.length) {
      const char = sentence.charAt(i);
      if (char === '\n') {
        if (sentence.charAt(i + 1) === '\n') {
          sentenceElement.innerHTML += '\n';
          i++;
        } else {
          sentenceElement.innerHTML += ' ';
        }
      } else {
        sentenceElement.innerHTML += char;
      }
      i++;
      setTimeout(typeWriter, speed);
    }
  }

  typeWriter();
</script>

@endsection
