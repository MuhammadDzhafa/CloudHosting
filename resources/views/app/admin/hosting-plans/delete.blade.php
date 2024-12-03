<div class="modal-card-body">
    <div class="inner-content" style="text-align: center;">
        <p id="modal-message">Are you sure you want to delete <strong id="modal-hosting-plan-name"></strong>?</p>
    </div>
</div>
<div class="modal-card-foot is-centered">
    <form id="delete-form" method="POST">
        @csrf
        @method('DELETE')
        <button class="button h-button h-modal-close" type="button">Cancel</button>
        <button class="button h-button is-danger is-raised" type="submit">Yes, Delete</button>
    </form>
</div>