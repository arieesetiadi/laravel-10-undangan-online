$(document).ready(function () {
    $('.datatable').DataTable({
        columnDefs: [
            { "orderable": false, "targets": [0] },
        ],
        order: []
    });
    $('.datatable.scroll-x').DataTable({
        columnDefs: [
            { "orderable": false, "targets": [0] },
        ],
        order: [],
        scrollX: true,
    });
});