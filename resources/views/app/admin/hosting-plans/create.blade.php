<form action="{{ route('hosting-plans.store') }}" method="POST">
    @csrf
    <div class="modal-card-body">
        <div class="columns">
            <div class="column is-6">
                <div class="column-content">
                    <div class="field" style="flex-basis: 50%;">
                        <label>Product Type</label>
                        <input type="hidden" name="product_type" id="product_type">
                        <div class="dropdown dropdown-trigger" style="width: 100%;">
                            <div class="is-trigger" style="width: 100%;">
                                <button class="button" type="button" aria-haspopup="true"
                                    aria-controls="product-type-dropdown-menu"
                                    style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="selectedProductType">Select Type</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="dropdown-menu" id="product-type-dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item" data-value="Cloud Hosting"
                                        onclick="selectProductType(this)">Cloud Hosting</a>
                                    <a href="#" class="dropdown-item" data-value="Wordpress Hosting"
                                        onclick="selectProductType(this)">Wordpress Hosting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field" style="flex-basis: 50%;">
                        <label>Package Type</label>
                        <input type="hidden" name="package_type" id="package_type">
                        <div class="dropdown dropdown-trigger" style="width: 100%;">
                            <div class="is-trigger" style="width: 100%;">
                                <button class="button" type="button" aria-haspopup="true"
                                    aria-controls="package-type-dropdown-menu"
                                    style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="selectedPackageType">Select Type</span>
                                    <span class="icon is-small">
                                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="dropdown-menu" id="package-type-dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item" data-value="Regular"
                                        onclick="selectPackageType(this)">Regular</a>
                                    <a href="#" class="dropdown-item" data-value="Custom"
                                        onclick="selectPackageType(this)">Custom</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

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
                        <label>Package Name</label>
                        <input class="input" name="name" placeholder="E.g Basic Plan"
                            style="width: 100%; padding: 10px;">
                    </div>

                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-12">
                <div class="column-content">
                    <div class="field" style="flex-basis: 50%;">
                        <label>Package Description</label>
                        <input
                            class="input"
                            id="package-description-input"
                            name="description"
                            placeholder="E.g Starter website"
                            pattern="^[a-zA-Z0-9\s()&-]+$"
                            title="Hanya huruf, angka, spasi, dan karakter ()&- yang diperbolehkan"
                            style="width: 100%; padding: 10px;"
                            required>
                        <p id="package-description-error" class="help is-danger" style="display:none;">
                            Hanya huruf, angka, spasi, dan karakter ()&- yang diperbolehkan
                        </p>
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

    function selectPackageType(element) {
        document.getElementById('package_type').value = element.getAttribute('data-value');
        document.getElementById('selectedPackageType').innerText = element.innerText;
    }

    function selectProductType(element) {
        document.getElementById('product_type').value = element.getAttribute('data-value');
        document.getElementById('selectedProductType').innerText = element.innerText;
    }
</script>