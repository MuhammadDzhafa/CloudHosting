<form action="{{ route('hosting-plans.store') }}" method="POST">
    @csrf
    <div class="modal-card-body">
        <div class="columns">
            <div class="column is-6">
                <div class="column-content">
                    <div class="field">
                        <label>Product Group</label>
                        <input type="hidden" name="hosting_group_id" id="hosting_group_id">
                        <div class="dropdown dropdown-trigger" style="width: 100%;">
                            <div class="is-trigger" style="width: 100%;">
                                <button class="button" type="button" aria-haspopup="true"
                                    aria-controls="group-dropdown-menu"
                                    style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="selectedGroup">Select Group</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="dropdown-menu" id="group-dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                @foreach ($hostingGroups as $group)
                                    <a href="#" class="dropdown-item" data-value="{{ $group->hosting_group_id }}"
                                        onclick="selectGroup(this)">{{ $group->name }}</a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field" style="flex-basis: 50%;">
                        <label>Product Name</label>
                        <input class="input" name="name" placeholder="E.g Basic Plan"
                            style="width: 100%; padding: 10px;">
                    </div>
                </div>
            </div>

            <div class="column is-6">
                <div class="column-content">
                    <div class="field" style="flex-basis: 50%;">
                        <label>Product Type</label>
                        <input type="hidden" name="type" id="type">
                        <div class="dropdown dropdown-trigger" style="width: 100%;">
                            <div class="is-trigger" style="width: 100%;">
                                <button class="button" type="button" aria-haspopup="true"
                                    aria-controls="type-dropdown-menu"
                                    style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="selectedType">Select Type</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="dropdown-menu" id="type-dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item" data-value="Regular Hosting"
                                        onclick="selectType(this)">Regular Cloud Hosting</a>
                                    <a href="#" class="dropdown-item" data-value="Regular Hosting"
                                        onclick="selectType(this)">Regular Wordpress Hosting</a>
                                    <a href="#" class="dropdown-item" data-value="Custom Hosting"
                                        onclick="selectType(this)">Custom Cloud Hosting</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field" style="flex-basis: 50%;">
                        <label>Product Description</label>
                        <input class="input" name="description" placeholder="E.g Starter website"
                            style="width: 100%; padding: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-card-foot is-centered">
        <button type="button" class="button h-button h-modal-close">Cancel</button>
        <button type="submit" class="button h-button is-primary is-raised">Create</button>
    </div>
</form>

<script>
    function selectGroup(element) {
        document.getElementById('hosting_group_id').value = element.getAttribute('data-value');
        document.getElementById('selectedGroup').innerText = element.innerText;
    }

    function selectType(element) {
        document.getElementById('type').value = element.getAttribute('data-value');
        document.getElementById('selectedType').innerText = element.innerText;
    }
</script>
