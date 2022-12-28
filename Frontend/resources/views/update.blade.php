<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="/update/article/{{ $res['data']['id'] }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="author" value="{{ $res['author'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="image" value="{{ $res['data']['iamge'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $res['data']['title'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Content</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="content" value="{{ $res['data']['content'] }}">
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>