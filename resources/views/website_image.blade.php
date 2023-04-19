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


<!DOCTYPE html>
<html>
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
</body>
</html> 






{{-- <form method="post" action="/convert">
    @csrf
    <input type="text" name="url" placeholder="Enter the URL">
    <button type="submit">Download</button>
</form> --}}
