
    function previewImage(input) {
        const preview = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

