<div class="modal fade modal-xl" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Subscriber</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    @csrf
                    <span class="text-danger" id='update-error-message'></span>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Subscriber Name"
                               name="name" required>
                        <span class="text-danger" id='update-name-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Enter Username" required>
                        <span class="text-danger" id='update-username-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password"
                               placeholder="Enter Password" required>
                        <span class="text-danger" id='update-password-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id='status' name="status" class="form-control" required>
                            <option value='{{\App\Enums\SubscriberStatus::ACTIVE}}'>Active</option>
                            <option value='{{\App\Enums\SubscriberStatus::BLOCKED}}'>Blocked</option>
                        </select>
                        <span class="text-danger" id='update-status-message'></span>
                    </div>
                    <input name="id" id="id" hidden value="0">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary subscriber-update-changes">Save</button>
            </div>
        </div>
    </div>
</div>
