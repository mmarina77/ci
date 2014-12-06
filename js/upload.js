$(function() {
	
	$('#upload_file').submit(function(e) {
        e.preventDefault();
        $.ajaxFileUpload({
			url             :'./upload/upload_file/', 
			secureuri       :false,
			fileElementId   :'userfile',
			dataType        : 'json',
			//data            : {
			//    'title': $('#title').val()
			//},
			success : function (data, status) {
				console.log(data);
				if(data.status != 'error') {
				
					$('#files').html('<p>Loaded file '+data.filename+'</p>');
					//refresh_files();
					window.location.replace("./readcsv/file/"+data.filename);
				}
				//alert(data.msg);
				 $('#uploadMessage').html(data.msg);
			},
			error: function(data) {
				console.log(data);
			}
        });
        return false;
    });
});

