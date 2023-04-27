<!DOCTYPE html>
<html>
<head>
    <title>Python Output</title>
</head>
<body>
    {{-- <a href="{{ $output}}" class="btn btn-primary">Run Python Script</a>

    <div>{{ $output }}</div> --}}


    <button onclick="runPython()">Run Python File</button>

<script>
function runPython() {
    $.ajax({
        url: '/run-python',
        type: 'GET',
        success: function(response) {
            console.log(response);
        }
    });
}
</script>


</body>
</html>
