    let items = [];
    let table = document.getElementById("orderTable");
    let id = document.querySelector('input[name="id"]').value;
    let client_id = document.querySelector('input[name="client_id"]').value;
    let status = document.querySelector('input[name="status"]').value;
    for (var i = 1, row; row = table.rows[i]; i++) {
        
        // ITEMS
        let article = row.cells[0].querySelector('input').value;
        let name = row.cells[1].querySelector('input').value;
        let price = row.cells[2].querySelector('input').value;
        let quantity = row.cells[3].querySelector('input').value;

        items.push({
            "article": article,
            "name": name,
            "price": price,
            "quantity": quantity
        });
    }

    let order = {
        "id": id,
        "client_id": client_id,
        "items": items,
        "status": status
    };
    let json = JSON.stringify(order);

    $(document).ready(function () {
    $("#order-form").on('submit', function (e){
        e.preventDefault();
        $.ajax({
            url: '/api/insales/scores/update',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            data: json,
            success: function(response) {
                $('#response').html('Ответ: '+response);
            }
        });
        e.preventDefault();
    });
});

