onloadGet();


function onloadGet() {
    $.ajax(
        {
            type: "GET",
            data: "",
            url : 'getData.php',
            success: function (result) {
                // console.log(result); result string
                var objResult = JSON.parse(result);
                // console.log(objResult); parse array of object
                // loop
                var dataHandler = $("#data");
                    dataHandler.html('');
                let no = 1;
                $.each(objResult, function(key,val) {
                    const newLine = $("<tr>");
                    
                    newLine.html(`<td>${no}</td>
                                <td>${val.name}</td>
                                <td>${val.nim}</td>
                                <td>${val.number}</td>`
                                );
                    dataHandler.append(newLine);
                    no++;
                });
            }
        }
    );
}

function insertData() {
    const name  = $('input[name="name"]').val();
    const nim   = $('input[name="nim"]').val();
    const phone = $('input[name="phone"]').val();

    $.ajax(
        {
            url:'insertData.php',
            type:'POST',
            data: `name=${name}&nim=${nim}&phone=${phone}`,
            success : function (result) {
                const objResult = JSON.parse(result);
                let alert = `<div class="alert alert-danger">${objResult.message}</div>`;
                $('#message').html(alert);
                onloadGet()
            }
        }
    )
}
