$(document).ready(function () {
    $('.datatable').DataTable({
        columnDefs: [
            { "orderable": false, "targets": [0] },
        ],
        order: [],
    });
});