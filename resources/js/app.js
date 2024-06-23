import 'flowbite';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

document.addEventListener('DOMContentLoaded', function () {
    const dropzoneElement = document.querySelector('#dropzone');
    if (dropzoneElement) {
        const dropzone = new Dropzone(dropzoneElement, {
            dictDefaultMessage: 'Sube tu imagen aquí',
            acceptedFiles: ".png,.jpg,.jpeg,.gif",
            addRemoveLinks: true,
            dictRemoveFile: 'Eliminar imagen',
            maxFiles: 1,
            uploadMultiple: false,

            init: function () {
                if (document.querySelector('[name="image"]').value.trim()) {
                    let file = {
                        name: document.querySelector('[name="image"]').value,
                        size: 12345
                    };

                    this.options.addedfile.call(this, file);
                    console.log(file);
                    console.log(file.name);
                    this.options.thumbnail.call(this, file, "/uploads/" + file.name);
                    file.previewElement.classList.add('dz-success');
                    file.previewElement.classList.add('dz-complete');
                }
            }
        });

        dropzone.on('success', function (file, response) {
            console.log(response);
            document.querySelector('[name="image"]').value = response.image;
        });

        dropzone.on('removedfile', function (file) {
            document.querySelector('[name="image"]').value = '';
        });
    }
});