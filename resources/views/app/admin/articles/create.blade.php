{{-- Modals --}}
<div id="addandedit" class="modal h-modal">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3 id="modal-title">Add Article</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
                    <form id="article-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="article_id" id="article_id"> <!-- Hidden field for article_id -->
                        <div class="field">
                            <label class="label" for="title">Title</label>
                            <div class="control">
                                <input type="text" class="input" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="content">Content</label>
                            <div class="control">
                                <textarea class="textarea" id="content" name="content" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="author">Author</label>
                            <div class="control">
                                <input type="text" class="input" id="author" name="author" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="image">Image</label>
                            <div class="control">
                                <div class="file has-name is-fullwidth">
                                    <label class="file-label" for="image">
                                        <input class="file-input" type="file" id="image" name="image">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                            </span>
                                            <span class="file-label" id="image-label">Choose a file..</span>
                                        </span>
                                        <span class="file-name light-text" id="image-name"></span>
                                    </label>
                                </div>
                                <img id="image-preview" src="" style="max-width: 100px; margin-top: 10px;">
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
    // Mendapatkan elemen input file dan elemen pratinjau gambar
    const fileInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imageName = document.getElementById('image-name');

    // Menangani perubahan pada input file
    fileInput.addEventListener('change', function() {
        const file = this.files[0]; // Mengambil file yang diunggah
        if (file) {
            const reader = new FileReader(); // Membaca file
            
            // Menampilkan nama file
            imageName.textContent = file.name;

            // Menampilkan pratinjau gambar
            reader.addEventListener('load', function() {
                imagePreview.setAttribute('src', this.result); // Mengatur src dari gambar pratinjau
                imagePreview.style.display = 'block'; // Menampilkan gambar pratinjau
            });

            reader.readAsDataURL(file); // Membaca file sebagai URL data
        } else {
            imageName.textContent = ''; // Mengosongkan nama file jika tidak ada file
            imagePreview.setAttribute('src', ''); // Mengosongkan pratinjau gambar
            imagePreview.style.display = 'none'; // Menyembunyikan pratinjau gambar
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editLinks = document.querySelectorAll('.edit-link');
        const addNewButton = document.querySelector('.addData'); // Button to add new article
        const form = document.querySelector('#article-form');
        const fileInput = document.querySelector('#image');
        const fileNameDisplay = document.querySelector('#image-name');
        const imagePreview = document.querySelector('#image-preview');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0]; // Get selected file
            if (file) {
                fileNameDisplay.textContent = file.name; // Display file name
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Show image preview
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = 'Choose a file...'; // Reset if no file selected
                imagePreview.src = ''; // Clear image preview
            }
        });

        // Function to open modal and reset form
        function openModal(isEdit = false) {
            if (isEdit) {
                document.querySelector('#modal-title').textContent = 'Edit Article';
            } else {
                resetForm();
                document.querySelector('#modal-title').textContent = 'Add Article';
            }
            document.querySelector('#addandedit').classList.add('is-active');
        }

        // Handle add button click
        addNewButton.addEventListener('click', () => {
            resetForm(); // Reset the form for adding a new article
            document.querySelector('#modal-title').textContent = 'Add Article'; // Set modal title
            form.action = "{{ route('articles.store') }}"; // Set action for adding
            form.method = 'POST'; // Set method to POST
        });

        // Handle edit button clicks
        editLinks.forEach(link => {
            link.addEventListener('click', () => {
                const id = link.getAttribute('data-id');
                const title = link.getAttribute('data-title');
                const author = link.getAttribute('data-author');
                const content = link.getAttribute('data-content');
                const image = link.getAttribute('data-image');

                // Set modal action for editing
                form.action = `/articles/${id}`; // Set action for PUT
                form.method = 'POST'; // Set method to POST

                // Populate form fields
                document.querySelector('#title').value = title;
                document.querySelector('#content').value = content;
                document.querySelector('#author').value = author;
                document.querySelector('#image-preview').src = image ? `/storage/article_images/${image}` : '';
                document.querySelector('#image-name').textContent = image ? image.split('/').pop() : 'Choose a file…';

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
        const modal = document.getElementById('addandedit');
        modal.addEventListener('click', (event) => {
            if (event.target === modal || event.target.classList.contains('h-modal-close')) {
                resetForm(); // Reset form when modal is closed
                modal.classList.remove('is-active'); // Close modal
            }
        });

        // Function to reset the form
        function resetForm() {
            form.reset(); // Clear all fields
            document.querySelector('#image-preview').src = ''; // Clear image preview
            document.querySelector('#image-name').textContent = 'Choose a file…'; // Reset file name display

            // Remove hidden input for PUT method if it exists
            const methodField = form.querySelector('input[name="_method"]');
            if (methodField) {
                methodField.remove();
            }
        }
    });
</script>


