function updateSelect(options) {
	var selects = $('select.hasUpdate');
    for (var i = 0; i < selects.length; ++i) {
    	let value = selects[i].getAttribute('value');
    	selects[i].innerHTML = "";
	    $.each(options, function( jjjj, el ) {
	    	if(el.text) {
	    		let o = new Option(el.text, el.value);
	      		if(el.value == value) o.selected = true;
	      		selects[i].append(o);
	    	}
		});
    }
}

function apiDelete(e) {
  e.preventDefault();
  if(!confirm('Bạn thật sự muốn xóa ?')) return;
  var data = {};
  data.id = e.target.getAttribute("deleteId");
  $.ajax({
    type: "POST",
    url: e.target.getAttribute("href"),
    data : data,
    complete: function(data,status) {
      var statusCode = data.status;
      console.log(data.responseText);
      data = JSON.parse(data.responseText);
      alertStatus(status,data.message);
      if(statusCode !== 200) return;
      var elementID = "row_id_" + e.target.getAttribute('deleteId');
      $("#" + elementID).remove();
    },
  });
}

function errorValue(data) {
    if(data.name.length < 3 || data.name.length > 200) return "Tên phải có chứa ít nhất 3 ký tự và nhiều nhất 200 ký tự<br>";
    if(data.ratting_order < 0 || data.ratting_order.length > 9) return "thứ tự ưu tiên nên là một số từ 1 đến 9<br>";
    return false;
}

function alertStatus(status,message) {
    $("#alert").html(`<div class="alert alert-` + status + ` alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>` + status + `!</strong> ` + message + `
    </div>`);
}