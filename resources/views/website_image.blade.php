{{-- <!-- resources/views/website_image.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Convert Website Images to WebP</title>
</head>
<body>
    <h1>Convert Website Images to WebP</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('convert') }}" method="POST">
        @csrf
        <div>
            <label for="website_url">Enter website URL:</label>
            <input type="text" id="website_url" name="website_url" value="{{ old('website_url') }}" placeholder="https://www.example.com">
        </div>
        <button type="submit">Convert to WebP and Download</button>
    </form>
</body>
</html>
 --}}
{{-- 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Image Optimizer</title>
</head>
<body>
    <h1>Website Image Optimizer</h1>

    <form action="{{ route('convert') }}" method="post">
        @csrf

        <div>
            <label for="url">URL of Website:</label>
            <input type="url" name="url" id="url" required>
        </div>

        <button type="submit">Convert Images to WebP and Download as ZIP</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html> --}}


<!-- <!DOCTYPE html>
<html>
    <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
<head>
    <title>Convert Website Images to WebP</title>
</head>
<body>
    <h1>Convert Website Images to WebP</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('convert') }}">
        @csrf
        <div>
            <label for="website_url">Website URL:</label>
            <input type="url" name="website_url" required>
        </div>
        <button type="submit">Convert</button>
    </form>
       </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>
</html>  -->






{{-- <form method="post" action="/convert">
    @csrf
    <input type="text" name="url" placeholder="Enter the URL">
    <button type="submit">Download</button>
</form> --}}
@extends('layouts.user_type.auth')

@section('content')
{{-- --}}
<html>
   

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Convert Website Images to WebP</h3>
                  <p class="mb-0">Convert Website Images to WebP</p>
                </div>
                <div class="card-body">


                    <form method="POST" action=" {{ route('convert') }} ">
                        @csrf
                        <label for= "website_url">Enter your website below:</label><br><br>
                        <div class="mb-3">

                        <input class="form-control" type="url" name="website_url" placeholder="website_url"><br><br>
                      </div>

                        <div class="text-center">
                        <button  type="submit" class="btn bg-gradient-info w-100" style="">Convert Images</button>
                        
                      </div>
                    </form>
            
                    {{-- @if (isset($convert))
                  
                        <div style="white-space: pre-line">  <p class="mb-0">{{$convert}}</p> </div>
                    
                    @endif --}}




               
                </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection