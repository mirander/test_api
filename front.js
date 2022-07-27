var front = {
    mainLoad: () => {
        $.ajax({
            url: '/api/get-all',
            type: 'GET',
            success: (response) => {
                front._dataList(response);
            }
        });
    },

     remove: (key) => {
        $.ajax({
            url: '/api/delete',
            type: 'DELETE',
            data: 'key=' + key,
            success: (response) => {
                front._dataList(response);
            }
        });
    },

     _dataList: (response) => {
        let array = JSON.parse(response);
        let items = array.data;
        let html = "";
        $.each(items, (i, item) => {
            html += '<li>' + i + ': ' + items[i] + '  | <a class="remove" onclick="front.remove(\'' + i + '\')">delete</a></li>';
        });

        $('.load').html(html);
    },

}