<!DOCTYPE html>
<html>
<head>
    <title>User Input</title>
</head>
<body>
    <form action="/execute-python" method="POST">
        @csrf
        <label for="inputValue">Enter a value:</label>
        <input type="text" name="inputValue" id="inputValue">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
