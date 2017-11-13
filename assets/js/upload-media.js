// $(function(){
//     $('#datetimepicker').datetimepicker({
//         format: 'HH:mm MMM DD',
//         sideBySide: true
//     }).on('dp.change', function (e) {
//         var iterasi = $('.dz-preview').length;

//         for (var i = 0; i < iterasi; i++) {
//             var newDate = moment(e.date).add(i+1, 'days').format('HH:mm MMM DD');
//             $('.post-date:eq('+i+')').val(newDate);
//         }
//     });
// });

String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g, "");
}

Dropzone.options.uploadMediaForm = {
    acceptedFiles: 'image/*',
    paramName: 'media',
    maxFileSize: 20, //Megabyte
    thumbnailWidth: '128',
    autoProcessQueue: false,
    previewsContainer: '.dropzone-previews',
    previewTemplate: '<div class="dz-preview dz-file-preview col-md-6" style="margin-bottom: 1em">' +
        '<div class="dz-image" style="display: flex"><img style="margin: 0 auto;" data-dz-thumbnail /></div>' +
        '<div class="dz-details">' +
        '    <div class="dz-size"><span data-dz-size></span></div>' +
        '    <div class="dz-filename"><span data-dz-name></span></div>' +
        '</div>' +
        '<div class="dz-error-message"><span data-dz-errormessage></span></div>' +
        '<form id="tambahan">' +
        '<input type="hidden" type="text" value="" class="post-date" name="post-date">' +
        '<textarea id="caption" name="caption" class="form-control caption" placeholder="Ayo jalan-jalan #coy"></textarea>' +
        '</form>' +
        '<div class="dz-progress"><span class="dz-upload" style="display: block; background-color: red; height: 10px; width: 0%;" data-dz-uploadprogress></span></div>' +
        '</div>',

    accept: function (media, done) {
        done();
    },
    init: function() {
        var submitButton = document.querySelector('#submit-btn');
        var myDropzone = this;

        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        myDropzone.on('processing', function() {
            this.options.autoProcessQueue = true;
        });

        myDropzone.on('sending', function(media, xhr, formData) {
            var previewForm = media.previewElement.querySelector('form');
            var formData2 = new FormData(previewForm);

            if (formData2.get('caption').trim() == '') {
                formData.append('ig_caption', document.getElementById('default-caption').value);
            } else {
                formData.append('ig_caption', formData2.get('caption'));
            }

            var additionalData = document.getElementById('data-tambahan');
            var additionalForm = new FormData(additionalData);

            formData.append('date', formData2.get('post-date'))
            formData.append('ig_id', additionalForm.getAll('ig_id[]'));
            formData.append('cron', additionalForm.get('cron'));
            formData.append('tipe', additionalForm.get('tipe'));
        });

        myDropzone.on('queuecomplete', function(file) {
            new PNotify({
                title: 'Semua sudah di upload',
                text: 'Santai, semua file sudah dimasukkan dalam database, tunggu waktu uploadnya ya...',
                type: 'success',
                styling: 'bootstrap3'
            });
            setTimeout(function() {
                window.location.reload();
            }, 2200);
        });
    }
};
