<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>

<form action="{{ route('upload') }}" method="post">
    {{csrf_field()}}
    <input type="file" name="photo">
    <button type="submit">Upload</button>
</form>
</body>
</html>