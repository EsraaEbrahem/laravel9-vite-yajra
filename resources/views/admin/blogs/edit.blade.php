<div class="modal fade modal-xl" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    @csrf
                    <span class="text-danger" id='update-error-message'></span>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image"
                               id="image"
                               required>
                        <span class="text-danger" id='update-image-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title"
                               id="title" placeholder="Enter title"
                               required>
                        <span class="text-danger" id='update-title-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content"
                                  id="content" placeholder="Enter content">
                        </textarea>
                        <span class="text-danger" id='update-content-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="publish_date">Publish date</label>
                        <input type="date" class="form-control" name="publish_date"
                               id="publish_date" placeholder="Enter publish_date"
                               required>
                        <span class="text-danger" id='update-publish_date-message'></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id='status' class="form-control" name="status" required>
                            <option value='{{\App\Enums\BlogStatus::DRAFT}}'>Draft</option>
                            <option value='{{\App\Enums\BlogStatus::PUBLISHED}}'>Published</option>
                        </select>
                        <span class="text-danger" id='update-status-message'></span>
                    </div>
                    <input name="id" id="id" hidden value="0">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary blog-update-changes">Save</button>
            </div>
        </div>
    </div>
</div>
