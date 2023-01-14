<div class="modal fade modal-xl" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Subscriber</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    @csrf
                    <span class="text-danger" id='create-error-message'></span>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Subscriber Name"
                               name="name" required>
                        <span class="text-danger" id='create-name-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Enter Username" required>
                        <span class="text-danger" id='create-username-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password"
                               placeholder="Enter Password" required>
                        <span class="text-danger" id='create-password-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id='status' name="status" class="form-control" required>
                            <option value='{{\App\Enums\SubscriberStatus::ACTIVE}}'>Active</option>
                            <option value='{{\App\Enums\SubscriberStatus::BLOCKED}}'>Blocked</option>
                        </select>
                        <span class="text-danger" id='create-status-message'></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary subscriber-save-changes">Save</button>
            </div>
        </div>
    </div>
</div>
