<button type="button" class="btn btn-sm btn-warning update-item"
        data-id='{{ $id }}'
        data-bs-toggle="modal" data-bs-target="#updateModal">
    <i class='bi bi-pen'></i>
</button>

<button type="button" class="btn btn-sm btn-primary view-item"
        data-id='{{ $id }}'
        data-bs-toggle="modal" data-bs-target="#viewModal">
    <i class='bi bi-eye'></i>
</button>

<button type="button" class='btn btn-sm btn-danger delete-item'
        data-id='{{ $id }}'>
    <i class='bi bi-trash'></i>
</button>
