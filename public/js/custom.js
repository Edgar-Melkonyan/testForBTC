$( document ).ready(function() {
    $("input[type='checkbox']").change(function() {
      	if(this.checked && this.id == 'picked') {
            $('#products').show();
        }
        else if(this.id == 'picked' && !this.checked) {
            $('#products').hide();
        }
    });
});

if($('#picked').is(':checked') == true) {
	$('#products').show();
}
else{
	$('#products').hide();
}

function updateViewCount(id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/product_view/"+id,
        type: 'POST',
        data: {_token: CSRF_TOKEN},
    });
}