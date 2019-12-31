<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Task List
                </a>
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{url('public/js/main.js')}}"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#add').show();
$('#update').hide();
$('.myid').hide();


function viewData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{route('task.index')}}",
        success: function(response) {
            var rows = "";
            $.each(response, function(key, value) {
                rows = rows + "<tr>";
                rows = rows + "<td>" + value.name + "</td>";
                rows = rows + '<td>';
                rows = rows + "<button type='button' class='btn btn-danger' onclick='deleteData(" + value.id + ")'><i class='fa fa-btn fa-trash'></i>Delete</button>"
                rows = rows + "<button type='button' class='btn btn-danger' onclick='editData(" + value.id + ")'><i class='fa fa-btn fa-edit'></i>EDIT</button>"
                rows = rows + '</td>';
                rows = rows + "</tr>";
            });
            $('#dbody').html(rows);
        }
    })

}
viewData();

function saveData() {
    var name = $('#name').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: { name:name },
        url: "{{route('task.store')}}",
        success: function(response) {
            console.log(response);
            viewData();
            delData();
            $('#add').show();

        }
    })


}

function updateData() {

    var name = $('#name').val();
    var id = $('#id').val();
    console.log(id);
    $.ajax({
        type: 'PUT',
        dataType: 'json',
        data: { name: name },
        url: "task/"+id,
        success: function(reponse) {
            viewData();
            delData();
            $('#add').show();
            $('#update').hide();
        }
    })


}

function delData() {

    $('#name').val('');
}
function editData(id){  
      $.ajax({
          type:'GET',
          dataType:'json',
          url:"task/"+id+"/edit",
          success:function(response)
          {
            $('#id').val(response.id);
              $('#name').val(response.name);
               $('#add').hide();
               $('#update').show();

          }

      })    

  }
function deleteData(id) {
    $.ajax({
        type: 'DELETE',
        dataType: 'json',

        url: "task/" + id,
        success: function(reponse) {
            viewData();
        }

    })

}
    </script>
</body>
</html>
