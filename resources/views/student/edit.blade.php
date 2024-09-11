<!DOCTYPE html>
<html>

<head>
    <title>AJAX Form Submission</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form action="" method="post" id="my-form">
        <input type="hidden" name="id" value="{{ $editstudent->id }}">
        <input type="text" name="name" placeholder="Name" value="{{ $editstudent->name }}"><br><br>
        <input type="email" name="email" placeholder="Email" value="{{ $editstudent->email }}"><br><br>
        <input type="text" name="address" placeholder="Address" value="{{ $editstudent->address }}"><br><br>
        <input type="number" name="number" placeholder="Number" value="{{ $editstudent->number }}"><br><br>
        <input type="submit" value="Submit">
    </form>
    <script>
        $(document).ready(function() {
            $('#my-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting via the browser

                var formData = {
                    id: $('input[name=id]').val(),
                    name: $('input[name=name]').val(),
                    email: $('input[name=email]').val(),
                    address: $('input[name=address]').val(),
                    number: $('input[name=number]').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('student.update') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = response.redirect;
                        } else {
                            console.error('Failed to add student');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            });
        });
    </script>
</body>

</html>
