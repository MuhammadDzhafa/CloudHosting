{{-- Modals --}}
<div id="addandedit-faq" class="modal h-modal">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3 id="modal-title-faq">Add FAQ</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <div class="inner-content">
                    <form id="faq-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label class="label" for="question">Question</label>
                            <div class="control">
                                <input type="text" class="input" id="question" name="question" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="answer">Answer</label>
                            <div class="control">
                                <textarea class="textarea" id="answer" name="answer" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="category">Category</label>
                            <div class="control">
                                <input type="text" class="input" id="category" name="category">
                            </div>
                        </div>
                        <div class="modal-card-foot is-centered">
                            <a class="button h-button h-modal-close">Cancel</a>
                            <button type="submit" class="button h-button is-primary is-raised">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editLinks = document.querySelectorAll('.edit-link'); // Ganti dengan kelas yang sesuai untuk tombol edit
        const addNewFaqButton = document.querySelector('.addData'); // Sesuaikan kelas ini dengan tombol "Add New"
        const formFaq = document.querySelector('#faq-form');

        // Fungsi untuk membuka modal dan mereset isinya
        function openModalFaq(isEdit = false) {
            if (isEdit) {
                document.querySelector('#modal-title-faq').textContent = 'Edit FAQ';
            } else {
                resetFaqForm(); // Pastikan form direset saat menambah FAQ
                document.querySelector('#modal-title-faq').textContent = 'Add FAQ';
            }
            document.querySelector('#addandedit-faq').classList.add('is-active');
        }

        // Handle add button click
        addNewFaqButton.addEventListener('click', () => {
            resetFaqForm(); // Reset the form for adding new FAQ
            formFaq.action = "{{ route('faqs.store') }}"; // Set action for adding
            formFaq.method = 'POST'; // Set method to POST
            // Hapus metode hidden input jika ada
            removeMethodField();
            openModalFaq(false); // Buka modal untuk Add FAQ
        });

        // Handle edit button clicks
        editLinks.forEach(link => {
            link.addEventListener('click', () => {
                const id = link.getAttribute('data-id');
                const question = link.getAttribute('data-question');
                const answer = link.getAttribute('data-answer');
                const category = link.getAttribute('data-category');

                // Populate form fields
                document.querySelector('#question').value = question;
                document.querySelector('#answer').value = answer;
                document.querySelector('#category').value = category;

                // Set modal action for editing
                formFaq.action = `/admin/faqs/${id}`; // Set action untuk PUT
                formFaq.method = 'POST'; // Set method to POST

                // Ensure PUT method hidden input is there
                let methodField = formFaq.querySelector('input[name="_method"]');
                if (!methodField) {
                    methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'PUT';
                    formFaq.appendChild(methodField);
                }

                // Open modal
                openModalFaq(true);
            });
        });

        // Fungsi untuk menghapus metode hidden input
        function removeMethodField() {
            const methodField = formFaq.querySelector('input[name="_method"]');
            if (methodField) {
                methodField.remove(); // Menghapus metode hidden input jika ada
            }
        }


        // Modal close handling
        const modalFaq = document.querySelector('#addandedit-faq');
        modalFaq.addEventListener('click', (event) => {
            if (event.target === modalFaq || event.target.classList.contains('h-modal-close')) {
                resetFaqForm(); // Reset form when modal is closed
                modalFaq.classList.remove('is-active'); // Close modal
            }
        });

        // Function to reset the FAQ form
        function resetFaqForm() {
            formFaq.reset(); // Clear all fields

            // Remove hidden input for PUT method if it exists
            const methodField = formFaq.querySelector('input[name="_method"]');
            if (methodField) {
                methodField.remove();
            }
        }
    });
</script>