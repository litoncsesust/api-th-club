var $ = jQuery;
$(document).ready( function () {
   
    $('#sortTable').DataTable({
      language: {
        paginate: {
          next: 'Næste',
          previous: 'Forrige'  
        },
        search: 'Søg',
        lengthMenu: 'Vis _MENU_ brugere',
        info: 'Viser _START_ til _END_ ud af _TOTAL_ brugere'
      }
    });

    $('#is-featured').on('click', function(){
      var s = $(this);
      toggleStatus(s);
      console.log("Clicked");
    });

    $('#point_expire_date').datepicker({
      format: 'yyyy-mm-dd'
    });
} );
$(document).ready(function() {
	if ($('#addFile').length > 0) {
    $('#addFile').click(function(e) {
      e.preventDefault();
      $('#filesContainer').append(
        $('<input/>').attr('type', 'file').attr('name', 'product_img[]')
      );
    });
  }
  if ($('a#sync').length > 0) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("a#sync").click(function(e){
			e.preventDefault();
			$.ajax({
				type:'POST',
				url:'http://test.bordingvista.com/dev.th-club.com/update/?key=rvpkdpkBJGopOqO41VwF8KxfaG3zyS6w',
				success:function(response){
					console.log(response);
				}
				});
		});
	}

	//=============Delete product image in edit action==================
    if ($('a.trash.editproduct').length > 0) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
      $('a.trash.editproduct').click(function(e) {
        e.preventDefault();
        var url      = window.location.href.split("/"),
          product_id = url[url.length-2];

        var $btn = $(this);

        var link = $(this).parent().find('img').attr('src'),
          parts = link.split("/"),
          img_name = parts[parts.length-1],
          imr_arr = img_name.split('.'),
          produt_name = imr_arr[0].split('-');
          console.log(produt_name);
          $.ajax({
            type: 'DELETE',
            url: base_url + '/file/'+produt_name[1],
            data: {},
            success: function(response){
              $btn.parent().css('display', 'none')
              //console.log(response);
            }
          });          
      });
    }
  //=============Delete product image in edit action==================


});
function toggleStatus(s) {
  if (s.is(':checked')) {
    s.val(1);
  }else{
    s.val(0);       
  }
}