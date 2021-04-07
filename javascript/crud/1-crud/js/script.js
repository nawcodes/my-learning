$.ajax(
    {
        type: "GET",
        data: "",
        url : 'getData.php',
        success: function (result) {
            var objResult = JSON.parse(result);
            $.each(objResult, function(key,val) {
                const newLine = $("<tr>");
                newLine.html(`<td>${val.id}</td>
                            <td>${val.name}</td>
                            <td>${val.nim}</td>
                            <td>${val.number}</td>`
                            );
                var dataHandler = $("#data");
                dataHandler.append(newLine);
            });
        }
    }
);
