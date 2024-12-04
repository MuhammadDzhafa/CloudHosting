{{-- Modals --}}
<div id="addandedit" class="modal h-modal">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3 id="modal-title">Add Testimonial</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
                    <div id="error-notification" class="notification is-danger is-light" style="display: none;">
                        The file size is too large. The maximum file size is 2MB.
                    </div>
                    <form id="testimonial-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label class="label" for="domain_web">Domain Web</label>
                            <div class="control">
                                <input type="text" class="input" id="domain_web" name="domain_web" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="testimonial_text">Testimonial Text</label>
                            <div class="control">
                                <textarea class="textarea" id="testimonial_text" name="testimonial_text" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="picture">Picture</label>
                            <div class="control">
                                <div class="file has-name is-fullwidth">
                                    <label class="file-label">
                                        <input class="file-input" type="file" id="picture" name="picture">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Choose a file...
                                            </span>
                                        </span>
                                        <span class="file-name light-text" id="picture-name"></span>
                                    </label>
                                </div>
                                <img id="picture-preview" src="" style="max-width: 100px; margin-top: 10px;">
                            </div>
                            @if ($errors->has('picture'))
                            <div class="alert alert-danger">
                                {{ $errors->first('picture') }}
                            </div>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label" for="occupation">Occupation</label>
                            <div class="control">
                                <input type="text" class="input" id="occupation" name="occupation">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="facebook">Facebook Profile (Optional)</label>
                            <div class="control">
                                <input type="text" class="input" id="facebook" name="facebook">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="instagram">Instagram Profile (Optional)</label>
                            <div class="control">
                                <input type="text" class="input" id="instagram" name="instagram">
                            </div>
                        </div>
                        <div class="modal-card-foot is-centered">
                            <a class="button h-button h-modal-close">Cancel</a>
                            <button type="submit" class="button h-button is-primary is-raised">Submit</button>
                        </div>
                        <!-- Modal "Saved!" -->
                        <div id="saved-modal" class="modal h-modal">
                            <div class="modal-background h-modal-close"></div>
                            <div class="modal-content">
                                <div class="modal-card">
                                    <div class="modal-card-body" style="border-radius: 6px 6px 0 0;">
                                        <div class="inner-content">
                                            <div class="section-placeholder">
                                                <div class="placeholder-content">
                                                    <i class="fas fa-check-circle fa-3x"></i>
                                                    <h3 class="dark-inverted">Saved!</h3>
                                                    <p>Your changes have been saved.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-card-foot is-centered">
                                        <button class="button h-button is-primary is-raised is-rounded h-modal-close">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#testimonial-form');
        const fileInput = document.querySelector('#picture');
        const errorNotification = document.querySelector('#error-notification');
        const fileNameDisplay = document.querySelector('#picture-name');
        const picturePreview = document.querySelector('#picture-preview');
        const maxFileSize = 2 * 1024 * 1024; // 2MB dalam byte

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                // Validasi ukuran file
                if (file.size > maxFileSize) {
                    // Menampilkan notifikasi error
                    errorNotification.style.display = 'block';

                    // Menghilangkan notifikasi setelah 7 detik
                    setTimeout(() => {
                        errorNotification.style.display = 'none';
                    }, 7000); // 7000ms = 7 detik

                    // Menghapus file input
                    fileInput.value = '';
                    fileNameDisplay.textContent = 'Choose a file...';
                    picturePreview.style.display = 'none';
                    return;
                }

                // Jika file valid, tampilkan preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    picturePreview.src = e.target.result; // Menampilkan gambar yang diunggah
                    picturePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                // Reset jika tidak ada file
                picturePreview.src = '';
                picturePreview.style.display = 'none';
            }
        });
    });



    // Fungsi untuk membuka modal dan mereset isinya
    function openModal(isEdit = false) {
        if (isEdit) {
            document.querySelector('#modal-title').textContent = 'Edit Testimonial';
        } else {
            resetForm();
            document.querySelector('#modal-title').textContent = 'Add Testimonial';
        }
        document.querySelector('#addandedit').classList.add('is-active');
    }

    // Handle add button click
    addNewButton.addEventListener('click', () => {
        resetForm(); // Reset the form for adding new testimonial
        document.querySelector('#modal-title').textContent = 'Add Testimonial'; // Set modal title
        form.action = "{{ route('testimonials.store') }}"; // Set action for adding
        form.method = 'POST'; // Set method to POST
    });

    // Handle edit button clicks
    editLinks.forEach(link => {
        link.addEventListener('click', () => {
            const id = link.getAttribute('data-id');
            const domain = link.getAttribute('data-domain');
            const text = link.getAttribute('data-text');
            const picture = link.getAttribute('data-picture');
            const occupation = link.getAttribute('data-occupation');
            const facebook = link.getAttribute('data-facebook');
            const instagram = link.getAttribute('data-instagram');

            // Set modal action for editing
            form.action = "{{ url('/admin/testimonials') }}/" + id; // Set action for PUT
            form.method = 'POST'; // Set method to POST

            // Populate form fields
            document.querySelector('#domain_web').value = domain;
            document.querySelector('#testimonial_text').value = text;
            document.querySelector('#occupation').value = occupation;
            document.querySelector('#facebook').value = facebook;
            document.querySelector('#instagram').value = instagram;
            document.querySelector('#picture-preview').src = picture ? `/storage/testimonial_pictures/${picture}` : '';
            document.querySelector('#picture-name').textContent = picture ? picture.split('/').pop() : 'Choose a file…';

            // Ensure PUT method hidden input is there
            let methodField = form.querySelector('input[name="_method"]');
            if (!methodField) {
                methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'PUT';
                form.appendChild(methodField);
            }

            // Open modal
            openModal(true);
        });
    });

    // Function to reset the form
    function resetForm() {
        form.reset(); // Clear all fields
        document.querySelector('#picture-preview').src = ''; // Clear picture preview
        document.querySelector('#picture-name').textContent = 'Choose a file…'; // Reset file name display

        // Remove hidden input for PUT method if it exists
        const methodField = form.querySelector('input[name="_method"]');
        if (methodField) {
            methodField.remove();
        }
    }
</script>

<script>
    document.getElementById('testimonial-form').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('picture');
        const errorNotification = document.getElementById('error-notification');

        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size / 1024 / 1024; // Convert bytes to MB
            if (fileSize > 2) {
                e.preventDefault(); // Stop form submission
                errorNotification.style.display = 'block'; // Show error notification

                // Automatically hide notification after 5 seconds
                setTimeout(() => {
                    errorNotification.style.display = 'none';
                }, 7000);
            }
        }
    });
</script>