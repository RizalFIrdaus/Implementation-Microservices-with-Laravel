<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Author</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($res as $index => $item)
        <tr>
          <td>{{ $index+1 }}</td>
          <td>{{ $item['author']}}</td>
          <td>{{ $item['data']['title'] }}</td>
          <td>{{ $item['data']['content']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>