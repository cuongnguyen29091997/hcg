function deleteType(e) {
    e.preventDefault();
    if (!confirm('Bạn đã chắc chắn muốn xóa nó ?')) return;
    var data = {};
    data.id = e.target.getAttribute("tmpID");
    $.ajax({
        type: "POST",
        url: "/cms-admin/api-project-type/delete",
        data: data,
        complete: function(data, status) {
            var statusCode = data.status;
            console.log(data.responseText,statusCode);
            data = JSON.parse(data.responseText);
            $("#alert").html(`<div class="alert alert-` + status + ` alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>` + status + `!</strong> ` + data.message + `
                            </div>`);
            if (statusCode !== 200) return;
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            $("#" + elementID).remove();
        },
    });
}

function editType(e) {
    e.preventDefault();
    var data = {};
    data.id = e.target.getAttribute("tmpID");
    $("#s-" + data.id).hide();
    $("#u-" + data.id).show();
    var element_row = $("#row_id_" + data.id);
    var elementName = element_row.find('input[name="name"]');
    var elementOrder = element_row.find('input[name="ratting_order"]');

    elementName.attr({ 'readonly': false, 'style': '' });
    elementOrder.attr({ 'readonly': false, 'style': '' });
}

function updateType(e) {
    e.preventDefault();
    var data = {};
    data.id = e.target.getAttribute("tmpID");
    var element_row = $("#row_id_" + data.id);
    var elementName = element_row.find('input[name="name"]');
    var elementOrder = element_row.find('input[name="ratting_order"]');
    var hide = $("#u-" + data.id);
    var show = $("#s-" + data.id);

    data.name = elementName.val();
    data.ratting_order = elementOrder.val();
       
    if(errorValue(data)) {
        alertStatus("info",errorValue(data));
        return;
    }

    $.ajax({
        type: "POST",
        url: "/cms-admin/api-project-type/update/",
        data: data,
        complete: function(data, status) {
            statusCode = data.status;
            console.log(data.responseText);
            data = JSON.parse(data.responseText);
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            $("#alert").html(`<div class="alert alert-` + status + ` alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>` + status + `!</strong> ` + data.message + `
            </div>`);
            if (statusCode !== 200) return;
            elementName.attr({ 'readonly': true, 'style': 'background-color: inherit;border : 0' });
            elementOrder.attr({ 'readonly': true, 'style': 'background-color: inherit;border : 0' });
            hide.hide();
            show.show();
        }
    });
}

function addType(e,controller) {
    e.preventDefault();
    var data = {};
    data['name'] = $('#form-add').find('input[name="name"]').val();
    data['ratting_order'] = $('#form-add').find('input[name="ratting_order"]').val();

    if(errorValue(data)) {
        alertStatus("info",errorValue(data));
        return;
    }
    $.ajax({
        type: "POST",
        url: "/cms-admin/api-project-type/insert",
        data: data,
        complete: function(data, status) {
            statusCode = data.status;
            console.log(data.responseText);
            data = JSON.parse(data.responseText);
            var result = data.result;
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            $("#alert").html(`<div class="alert alert-` + status + ` alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>` + status + `!</strong> ` + data.message + `
                            </div>`);
            if (statusCode !== 200) return;
            // append
            $("#table tbody").prepend(
                "<tr id='row_id_" + result.id + "'>" +
                "<td><input type='text' value='" + result.name + "' readonly style='background-color: inherit;border: 0' name='name' /></td>" +
                "<td><input type='number' value='" + result.ratting_order + "' readonly style='background-color: inherit;border: 0' name='ratting_order' /></td>" +
                "<td>" +
                "<a id='s-" + result.id + "' tmpID='" + result.id + "' class='btn btn-default' onclick='editType(event,\"" + controller + "\")'>Sửa</a>" +
                "<a id='u-" + result.id + "' tmpID='" + result.id + "' class='btn btn-primary' onclick='updateType(event,\"" + controller + "\")' style='display : none'>Update</a>" +
                "<a tmpID='" + result.id + "' class='btn btn-danger' onclick='deleteType(event,\"" + controller + "\")' >Xóa</a>" +
                "</td>" +
                "</tr>"
            );
            $('#form-add').find('input[name="name"]').val("");
            $('#form-add').find('input[name="ratting_order"]').val("");
        },
    });
}