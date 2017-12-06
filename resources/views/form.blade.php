<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Dependant Select Box using JQuery Ajax Example</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <h1>Dynamic Dependant Select Box using JQuery Ajax Example</h1>

    <form method="" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Select Country:</label>
            <select class="form-control" name="branch">
                <option value="">---</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Select specialized:</label>
            <select class="form-control" name="specialized">
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>

</div>

<script type="text/javascript">
    var url = "{{ url('/select') }}";
    $("select[name='branch']").change(function(){
        var branch_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                branch_id: branch_id,
                _token: token
            },
            success: function(data) {
                $("select[name='specialized'").html('');
                $.each(data, function(key, value){
                    $("select[name='specialized']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });
</script>
</body>
</html>