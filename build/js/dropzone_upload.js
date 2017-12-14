Dropzone.autoDiscover = false;
if (document.getElementById('my_dropzone')) {
    var myDropzone = new Dropzone('#my_dropzone', {
        maxFiles: 1,

        init: function () {
            var me = this;
            $.get(base_url + 'admin/upload/list_picture_users/' + parameter_0 + "/" + parameter_1, function (data) {


                if(data.length > 0){
                    $.each(data, function (key,value) {

                        var mockFile = value;
                        var mockFile2 = { name: "myimage.jpg", size: 12345, type: 'image/jpeg' };

                        me.emit('addedfile', mockFile);
                        me.createThumbnailFromUrl(mockFile, base_url + "images/" + value.name);
                        me.emit("complete", mockFile);
                        var existingFileCount = 1;
                        me.options.maxFiles = me.options.maxFiles - existingFileCount;



                        
                    })
                }


            });
            this.on("maxfilesexceeded", function (file) {
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

            if (name) {
                if (response == 'false') {
                    //console.log('could not find item :' + response)
                    // This part is now unnecessery but leaving it for future lookup.
                    $(function () {
                        new notification_Pnotify_error(' Could not find item.');
                    });

                } else {
                    console.log('Succesfully Uploaded: ' + response);
                    $(function () {
                        new notification_Pnotify("Succesfully Changed Picture To : "+response);
                    });
                }
            }                                                                  //returning response from controller (upload/upload_image)


        },
        removedfile: function (file) {
            name = $(file.previewElement).find('[data-dz-name]').text();
            if(this.options.maxFiles === 0) {this.options.maxFiles = 1;}
            console.log(file.name);
            console.log("data-dz-name: ---" + name + "---");
            $.ajax({
                type: "POST",
                url: base_url + 'admin/upload/remove',
                data: {file: name, param0: parameter_0, param1: parameter_1},
                success: function (result) {
                    console.log(" AJAX SUCCUESS ");
                    if (result) {
                        //console.log('inside if statement');
                        $(function () {
                            new notification_Pnotify(result);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // check status && error
                    console.log(" AJAX HATA: " + error);
                    console.log(" status: " + status);
                    console.log(" xhr: " + xhr.toString());
                }
            });

            var previewElement;
            return (previewElement = file.previewElement) != null ?
                (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
        }
    });

}else if(document.getElementById('my_dropzone2')){

    var myDropzone = new Dropzone('#my_dropzone2', {
        maxFiles: 20,

        init: function () {


            var me = this;
            $.get(base_url + 'admin/upload/list_picture_gallery/' + parameter_0, function (data) {


                if(data.length > 0){
                    $.each(data, function (key,value) {

                        var mockFile = value;


                        me.files.push(mockFile);
                        me.emit('addedfile', mockFile);
                        me.createThumbnailFromUrl(mockFile, base_url + "images/" + value.name);
                        me.emit("complete", mockFile);
                        var existingFileCount = 1;
                        me.options.maxFiles = me.options.maxFiles - existingFileCount;





                    })
                }


            });





            this.on("maxfilesexceeded", function (file) {
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

            if (name) {
                if (response == 'false') {
                    //console.log('could not find item :' + response)
                    // This part is now unnecessery but leaving it for future lookup.
                    $(function () {
                        new notification_Pnotify_error(' Could not find item.');
                    });

                } else {
                    //console.log('Succesfully Uploaded: ' + response);
                    $(function () {
                        new notification_Pnotify("Succesfully Changed Picture To : "+response);
                    });
                }
            }                                                                  //returning response from controller (upload/upload_image)


        },
        removedfile: function (file) {
            name = $(file.previewElement).find('[data-dz-name]').text();
            //console.log("---------1>"+name+"<1----------");
            console.log(file.name)

            $.ajax({
                type: "POST",
                url: base_url + 'admin/gallery/remove_from_gallery',
                data: {file: name, param0: parameter_0, param1: parameter_1},
                success: function (result) {
                    console.log(result);
                    console.log(parameter_0);
                    if (result) {
                        //console.log('inside if statement');
                        $(function () {
                            new notification_Pnotify(result);
                        });
                    }
                }
            });

            var previewElement;
            return (previewElement = file.previewElement) != null ?
                (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
        }
    });

}


