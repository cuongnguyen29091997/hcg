function deleteType(e,controller) {
    e.preventDefault();
    if (!confirm('Bạn đã chắc chắn muốn xóa nó ?')) return;
    var data = {};
    data.id = e.target.getAttribute("tmpID");
    $.ajax({
        type: "POST",
        url: "/cms-admin/" + controller + "/delete",
        data: data,
        complete: function(data, status) {
            var statusCode = data.status;
            console.log(data.responseText,statusCode);
            data = JSON.parse(data.responseText);
            alertStatus(status,data.message);
            if (statusCode !== 200) return;
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            $("#" + elementID).remove();
            for(var i = 0;i < glbOptions.length;++i) {
                if(glbOptions[i].value == data.id) {
                    console.log(glbOptions[i]);
                    glbOptions.splice(i,1);
                    updateSelect(glbOptions);
                    break;
                }
            }
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
    var elementParent = element_row.find('select[name="parent_id"]');

    elementName.attr({ 'readonly': false, 'style': '' });
    elementOrder.attr({ 'readonly': false, 'style': '' });
    elementParent.attr({ 'disabled': false, 'style': '' });
}

function updateType(e,controller) {
    e.preventDefault();
    var data = {};
    data.id = e.target.getAttribute("tmpID");
    var element_hide = $("#u-" + data.id);
    var element_show = $("#s-" + data.id);
    var element_row = $("#row_id_" + data.id);
    var elementName = element_row.find('input[name="name"]');
    var elementOrder = element_row.find('input[name="ratting_order"]');
    var elementParent = element_row.find('select[name="parent_id"]');

    data.name = elementName.val();
    data.ratting_order = elementOrder.val();
    data.parent_id = elementParent.val();

    if(errorValue(data)) {
        alertStatus("info",errorValue(data));
        return;
    }

    var tempName = elementName.attr('value');
    var tempParent = elementParent.attr('value');
    var tempData = data;

    $.ajax({
        type: "POST",
        url: "/cms-admin/" + controller + "/update",
        data: data,
        complete: function(data, status) {
            statusCode = data.status;
            console.log(data.responseText,statusCode);
            data = JSON.parse(data.responseText);
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            alertStatus(status,data.message);
            if (statusCode !== 200) return;
            if(tempParent === "" && tempData.parent_id !== "") {
                for(var i = 0;i < glbOptions.length;++i) {
                    if(glbOptions[i].value === tempData.id) {
                        glbOptions.splice(i,1);
                        updateSelect(glbOptions);
                        break;
                    }
                }
            } else if(tempParent !== "" && tempData.parent_id === "") {
                let o = new Option(tempName, tempData.id);
                glbOptions.push(o);
                updateSelect(glbOptions);
            }
            elementName.attr({ 'readonly': true, 'style': 'background-color: inherit;border : 0' });
            elementOrder.attr({ 'readonly': true, 'style': 'background-color: inherit;border : 0' });
            elementParent.attr({ 'disabled': true, 'style': 'background-color: inherit;border : 0' });
            element_hide.hide();
            element_show.show();
            elementParent.val(tempData.parent_id);
        }
    });
}

function addType(e,controller) {
    e.preventDefault();
    var data = {};
    data['name'] = $('#form-add').find('input[name="name"]').val();
    data['ratting_order'] = $('#form-add').find('input[name="ratting_order"]').val();
    data['parent_id'] = $('#form-add').find('select[name="parent_id"]').val();
    if(errorValue(data)) {
        alertStatus("info",errorValue(data));
        return;
    }
    $.ajax({
        type: "POST",
        url: "/cms-admin/" + controller + "/insert",
        data: data,
        complete: function(data, status) {
            statusCode = data.status;
            data = JSON.parse(data.responseText);
            var result = data.result;
            var elementID = "row_id_" + e.target.getAttribute('tmpID');
            alertStatus(status,data.message);
            if (statusCode !== 200) return;
            $("#table tbody").prepend(
                "<tr id='row_id_" + result.id + "'>" +
                "<td><input type='text' value='" + result.name + "' readonly style='background-color: inherit;border: 0' name='name' /></td>" +
                "<td name='parent_id'>" + 
                    "<select disabled='true' style='background-color: inherit;border: 0' name='parent_id' class='hasUpdate' value='" 
                        + (result.parent_id ?  result.parent_id : '') + "'>"
                        + (result.parent_name ?  result.parent_name : '') + "</select>" +
                "</td>" + 
                "<td><input type='number' value='" + result.ratting_order + "' readonly style='background-color: inherit;border: 0' name='ratting_order' /></td>" +
                "<td>" +
                "<a id='s-" + result.id + "' tmpID='" + result.id + "' class='btn btn-default' onclick='editType(event,\"" + controller + "\")'>Sửa</a>" +
                "<a id='u-" + result.id + "' tmpID='" + result.id + "' class='btn btn-primary' onclick='updateType(event,\"" + controller + "\")' style='display : none'>Update</a>" +
                "<a tmpID='" + result.id + "' class='btn btn-danger' onclick='deleteType(event,\"" + controller + "\")' >Xóa</a>" +
                "</td>" +
                "</tr>"
            );
            if(!result.parent_id) {
                let o = new Option(result.name, result.id);
                glbOptions.push(o);
            }
            updateSelect(glbOptions);
        },
    });
    $('#form-add').find('input[name="name"]').val("");
    $('#form-add').find('input[name="parent_id"]').val("");
    $('#form-add').find('input[name="ratting_order"]').val("");
}