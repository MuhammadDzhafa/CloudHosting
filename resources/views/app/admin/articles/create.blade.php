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

