Dropzone.autoDiscover = false;
var myDropzone = new Dropzone('#my_dropzone', {
    maxFiles: 2,

    init: function() {
        this.on("maxfilesexceeded", function(file){
            var _ref;
            if (file.previewElement) {
                if ((_ref = file.previewElement) != null) {
                    _ref.parentNode.removeChild(file.previewElement);
                }
            }
            $(function () {
                new notification_Pnotify_error('Max files exceeded.');
            })
        });

    },


    success: function (file, response) {
        var name = file.name;
        //console.log(name + " succesfully send.");
        $(file.previewElement).find('[data-dz-name]').html(response);

        if(name)  {
            if (response == 'false'){
                //console.log('could not find item :' + response)
                // This part is now unnecessery but leaving it for future lookup.
                $(function () {
                    new notification_Pnotify_error(' Could not find item.');
                });

            }else {
                //console.log('Succesfully Uploaded: ' + response);
                $(function () {
                    new notification_Pnotify('Succesfully Uploaded');
                });
            }
        }                                                                  //returning response from controller (upload/upload_image)


    },
    removedfile: function(file){
        name = $(file.previewElement).find('[data-dz-name]').text();
        //console.log("---------1>"+name+"<1----------");
        $.ajax({
            type:"POST",
            url:  base_url+'admin/upload/remove',
            data: { file: name, param0: parameter_0, param1 : parameter_1 },
            success: function(result){
                console.log(result);
                if(result)  {
                    //console.log('inside if statement');
                    $(function(){
                        new notification_Pnotify(result);
                    });
                }
            }
        });

        var previewElement;
        return (previewElement=file.previewElement) != null ?
            (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
    }});

