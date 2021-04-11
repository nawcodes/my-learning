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
                                <td>${val.number}</td>
                                <td><button class="badge badge-sm badge-primary text-primary" onclick="getId(${val.id})">edit</button></td>`);
                    dataHandler.append(newLine);
                    no++;
                    $('#btn-update').hide();

                });
                
            }
        }
    );
}


function getId(dataId) {
    const id = dataId;
    $.ajax(
        {
            type:'post',
            data:`id=${id}`,
            url:'editData.php',
            success: function (result) {
                const objResult = JSON.parse(result);
                $('[name="id"]').val(objResult.id);
                $('[name="name"]').val(objResult.name);
                $('[name="nim"]').val(objResult.nim);
                $('[name="phone"]').val(objResult.number);
                $('#btn-add').hide();
                $('#btn-update').show();
                
            }

        }
    )
}


function updateData() {
    const id  = $('input[name="id"]').val();
    const name  = $('input[name="name"]').val();
    const nim   = $('input[name="nim"]').val();
    const phone = $('input[name="phone"]').val();

    $.ajax(
        {
            url:'updateData.php',
            type:'POST',
            data: `id=${id}&name=${name}&nim=${nim}&phone=${phone}`,
            success : function (result) {
                const objResult = JSON.parse(result);
                let alert = `<div class="alert alert-danger">${objResult.message}</div>`;
                $('#message').html(alert);
                onloadGet();
            }
        }
    )
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
                onloadGet();
            }
        }
    )
}
