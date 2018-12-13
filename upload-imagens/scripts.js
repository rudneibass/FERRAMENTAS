$('#enviar').on('click', function (e)
    {
        e.preventDefault();
        var form = $('form')[0];
        var formData = new FormData(form);

        $.ajax({
            url: 'leis_controller.php?act=upload',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
              toastr["success"](data);
			  
			  var elemento = document.getElementById("anexos");
			while (elemento.firstChild) {
				elemento.removeChild(elemento.firstChild);
				}
                
            }
        });
    });

   