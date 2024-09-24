<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Testimonial</h1>
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="domain_web" class="form-label">Domain Web</label>
                <input type="text" class="form-control" id="domain_web" name="domain_web" required>
            </div>
            <div class="mb-3">
                <label for="testimonial_text" class="form-label">Testimonial Text</label>
                <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture (optional)</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation">
          </div>
          <div class="form-group">
            <label for="facebook">Facebook Profile (Optional)</label>
            <input type="url" class="form-control" id="facebook" name="facebook">
          </div>
          <div class="form-group">
            <label for="instagram">Instagram Profile (Optional)</label>
            <input type="url" class="form-control" id="instagram" name="instagram">
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html> -->

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
                                                <div class="control">
                                                    <div class="file has-name is-fullwidth">
                                                        <label class="file-label" for="picture">
                                                            <input class="file-input" type="file" id="picture" name="picture">
                                                            <span class="file-cta">
                                                                <span class="file-icon">
                                                                    <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                                                </span>
                                                                <span class="file-label" id="picture" name="picture">
                                                                    Chosee a file..
                                                                </span>
                                                            </span>
                                                            <span class="file-name light-text" id="picture-name">
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <img id="picture-preview" src="" style="max-width: 100px; margin-top: 10px;">
                                                </div>
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

                                            <div class="modal-card-foot is-end">
                                                <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                <button type="submit" class="button h-button is-primary is-raised is-rounded">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                        const editLinks = document.querySelectorAll('.edit-link');
                        const addNewButton = document.querySelector('.addData'); // Tombol "Add New"
                        const form = document.querySelector('#testimonial-form');
                        const fileInput = document.querySelector('#picture');
                        const fileNameDisplay = document.querySelector('#picture-name');
                        const picturePreview = document.querySelector('#picture-preview');

                        fileInput.addEventListener('change', (event) => {
                            const file = event.target.files[0]; // Ambil file yang dipilih
                            if (file) {
                                fileNameDisplay.textContent = file.name; // Ubah teks menjadi nama file
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    picturePreview.src = e.target.result; // Tampilkan preview gambar yang diupload
                                };
                                reader.readAsDataURL(file);
                            } else {
                                fileNameDisplay.textContent = 'Choose a file...'; // Jika tidak ada file yang dipilih
                                picturePreview.src = ''; // Hapus preview gambar
                            }
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
                                form.action = `/testimonials/${id}`; // Set action for PUT
                                form.method = 'POST'; // Set method to POST

                                // Populate form fields
                                document.querySelector('#domain_web').value = domain;
                                document.querySelector('#testimonial_text').value = text;
                                document.querySelector('#occupation').value = occupation;
                                document.querySelector('#facebook').value = facebook;
                                document.querySelector('#instagram').value = instagram;
                                document.querySelector('#picture-preview').src = picture ? `/storage/${picture}` : '';
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

                        // Modal close handling
                        modal.addEventListener('click', (event) => {
                            if (event.target === modal || event.target.classList.contains('h-modal-close')) {
                                resetForm(); // Reset form when modal is closed
                                modal.classList.remove('is-active'); // Close modal
                            }
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
                    });

                    </script>

                