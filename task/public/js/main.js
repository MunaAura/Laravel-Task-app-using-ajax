$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#add').show();
$('#update').hide();


function viewData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/tasks",
        success: function(response) {
            console.log(response);

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
            $('tbody').html(rows);

        }
    })

}
viewData();

function saveData() {
    var name = $('#name').val();

    console.log(name);

    $.ajax({
        type: 'POST',
        dataType: 'json',


        data: { name: name },
        url: "/task",
        success: function(response) {
            console.log(response);
            viewData();
            clearData();
            $('#save').show();

        }
    })


}

function updateData() {

    var name = $('#name').val();

    $.ajax({
        type: 'PUT',
        dataType: 'json',
        data: { name: name },

        url: "task/" + id,
        success: function(reponse) {

            viewData();

            clearData();

            $('#save').show();
            $('#update').hide();
        }
    })


}

function clearData() {

    $('#name').val('');



}

function editData(id) {

    $('.myid').show();

    $.ajax({
        type: 'GET',
        dataType: 'json',


        url: "create/" + id,
        success: function(response) {

            $('#name').val(response.name);

            $('#save').hide();
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