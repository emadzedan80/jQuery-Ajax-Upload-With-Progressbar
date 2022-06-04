var serverstaticpathPHP = "http://localhost/jQuery-Ajax-Upload-With-Progressbar";
//var serverstaticpathPHP = "https://demo.tokyoacademics.com";
$(document).ready(function() {
    $("#file-cv").on("change", function(e) {
        var approvedHTML = "";
        var files = e.currentTarget.files;
        var filesize = ((files[0].size / 1024) / 1024).toFixed(4); // MB
        if (typeof files[0].name != "undefined" && filesize <= 25) {
            approvedHTML += "<div>" + files[0].name + "</div>";
        }
        $("#approvedFiles").append(approvedHTML);
    });

    $("#file-cover-letter").on("change", function(e) {
        var approvedHTML = "";
        var files = e.currentTarget.files;
        var filesize = ((files[0].size / 1024) / 1024).toFixed(4); // MB
        if (typeof files[0].name != "undefined" && filesize <= 25) {
            approvedHTML += "<div>" + files[0].name + "</div>";
        }
        $("#approvedFiles").append(approvedHTML);
    });


    $("#jquery-hr-form").submit(function(e) {
        e.preventDefault();
        $("#token").val(grecaptcha.getResponse(widgetId1));
        if ($("#file-cv").val() == "" || $("#file-cover-letter").val() == "" || $("#email").val() == "" || $("#first-name").val() == "" || $("#last-name").val() == "") {
            $("#error-message").addClass("d-block");
            $("#error-message").html("All Fields Are Required!");
            //$("#email").focus();
        } else {
            if ($("#token").val() == "" || !$("#token").val() || $("#token").val().length <= 0) {
                $("#error-message").addClass("d-block");
                $("#error-message").html("Please Check reCaptcha!");
            } else {

                var form_data = new FormData(document.getElementById("jquery-hr-form"));
                //var file_cv = $("#file-cv")[0].files[0];
                //var file_cover_letter = $("#file-cover-letter")[0].files[0];
                //form_data.append('file_cv', file_cv);
                //form_data.append('file_cover_letter', file_cover_letter);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(event) {
                            if (event.lengthComputable) {
                                var percentComplete = event.loaded / event.total;
                                percentComplete = parseInt(percentComplete * 100);

                                $(".progress-all-files .progress-bar").width(percentComplete + '%');
                                $(".progress-all-files .progress-bar").text(percentComplete + '% uploaded... please wait');
                                if (percentComplete === 100) {
                                    $(".progress-all-files .progress-bar").text(percentComplete + '% uploaded.');
                                    $("#error-message").removeClass("d-block").addClass("d-none");
                                }
                            }
                        }, false);
                        return xhr;
                    },
                    url: serverstaticpathPHP + "/version2-action/",
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data != 0) {
                            $("#error-message").removeClass("d-block").addClass("d-none");
                            $("#success-message").html("Successful jQuery File Upload." + data);
                        } else {
                            $("#error-message").addClass("d-block");
                            $("#error-message").html("JQuery File Upload Error.");
                        }
                    },
                    error: function(errorMessage) {
                        $("#error-message").addClass("d-block");
                        $("#error-message").html(errorMessage);
                    }
                });
            }
        }
    });
});