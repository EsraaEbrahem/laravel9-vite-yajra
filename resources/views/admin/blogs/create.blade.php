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
                        <label for="c-image">Image</label>
                        <input type="file" class="form-control" name="c-image"
                               id="c-image"
                               required>
                        <span class="text-danger" id='create-image-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title"
                               id="c-title" placeholder="Enter title"
                               required>
                        <span class="text-danger" id='create-title-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content"
                                  id="c-content" placeholder="Enter content">
                        </textarea>
                        <span class="text-danger" id='create-content-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="publish_date">Publish date</label>
                        <input type="date" class="form-control" name="publish_date"
                               id="c-publish_date" placeholder="Enter publish_date"
                               required>
                        <span class="text-danger" id='create-publish_date-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id='c-status' class="form-control" name="status" required>
                            <option value='{{\App\Enums\BlogStatus::DRAFT}}'>Draft</option>
                            <option value='{{\App\Enums\BlogStatus::PUBLISHED}}'>Published</option>
                        </select>
                        <span class="text-danger" id='create-status-message'></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary blog-save-changes">Save</button>
            </div>
        </div>
    </div>
</div>
