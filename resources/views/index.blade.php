<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 6 ajax form submit with Jquery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Processing an AJAX Form</h1>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('student.save') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="">
        </div>
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
</div>

<script>
    $("form").submit(function (event) {
        let form_action = $("form").attr("action");
        let formData = {
            name: $("#name").val(),
            _token: '{{csrf_token()}}'
        }
        $.ajax({
            type: "POST",
            url: form_action,
            data: formData,
            dataType: "json",
            encode: true,
        })

        event.preventDefault();
    });
</script>
</body>
</html>
