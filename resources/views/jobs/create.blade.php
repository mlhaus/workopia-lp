<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Job</title>
</head>

<body>
<h1>Create Job</h1>
<form action="/jobs" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title" />
    <input type="text" name="description" placeholder="Description" />
    <button type="submit">Submit</button>
</form>
</body>
</html>
