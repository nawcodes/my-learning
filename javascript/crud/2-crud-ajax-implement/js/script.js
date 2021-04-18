onloadGet();


function onloadGet() {
    $.ajax(
        {
            type:'get',
            data:'',
            url:'Controller/getData.php',
            success: function (result) {
                const objResult     = JSON.parse(result);
                const dataHandler   = $('#data');
                dataHandler.html('');
                let no = 1;
                $.each(objResult.data, function(i,val) {
                    const dataRow = $("<tr>");
                    dataRow.html(
                        `<td>${no}</td>
                        <td>${val.name}</td>
                        <td>${val.nim}</td>
                        <td>${val.email}</td>
                        <td>${val.phone}</td>
                        <td>${val.image}</td>
                        <td>${val.about}</td>
                        <td>
                        <button type="button" class="badge rounded-pill bg-primary text-white" data-toggle="modal" data-target="#exampleModal" onclick="getId(${val.id})">update</button>
                        `
                    );
                    no++
                    dataHandler.append(dataRow);
                }); 
               
                
            }
        }
    )
}

function insert() {
    const name = $('input[name="name"]').val();
    const nim = $('input[name="nim"]').val();
    const email = $('input[name="email"]').val();
    const phone = $('input[name="phone"]').val();
    const image = $('input[name="image"]').val();
    const about = $('textarea[name="about"]').val();

    $.ajax(
        {
            type:'post',
            url: 'Controller/insertData.php',
            data: `name=${name}&nim=${nim}&email=${email}&phone=${phone}&image=${image}&about=${about}`,
            success: function (result) {
                const objResult = JSON.parse(result)
                const showMessage = $('.alert-msg');
                showMessage.html(
                    `<div class="alert alert-primary">${objResult.message}</div>`
                );
                onloadGet();
                $('#exampleModal').modal('hide');
                defaultValues();
            }
        }
        
    ) 

}


function getId(dataId) {
    const id = dataId;
    $.ajax(
        {
            type:'post',
            url: 'Controller/getId.php',
            data: `id=${id}`,
            success: function (result) {
                const objRowResult = JSON.parse(result)
                $('input[name="id"]').val(objRowResult.id);
                $('input[name="name"]').val(objRowResult.name);
                $('input[name="nim"]').val(objRowResult.nim);
                $('input[name="email"]').val(objRowResult.email);
                $('input[name="phone"]').val(objRowResult.phone);
                $('input[name="image"]').val(objRowResult.image);
                $('textarea[name="about"]').val(objRowResult.about);
                $('.btn-insert').html('Update');
                $('.btn-insert').removeAttr('onclick');
                $('.btn-insert').click(function() {
                    $('.btn-insert').removeAttr('onclick');
                    $('.btn-insert').attr('onclick', update()); 
                });     
            }
        }
    )
}


function update() {
    const id = $('input[name="id"]').val();
    const name = $('input[name="name"]').val();
    const nim = $('input[name="nim"]').val();
    const email = $('input[name="email"]').val();
    const phone = $('input[name="phone"]').val();
    const image = $('input[name="image"]').val();
    const about = $('textarea[name="about"]').val();

    $.ajax(
        {
            type:'post',
            url: 'Controller/updateData.php',
            data: `id=${id}&name=${name}&nim=${nim}&email=${email}&phone=${phone}&image=${image}&about=${about}`,
            success: function (result) {
                const objResult = JSON.parse(result)
                const showMessage = $('.alert-msg');
                showMessage.html(
                    `<div class="alert alert-primary">${objResult.message}</div>`
                );
                onloadGet();
                $('#exampleModal').modal('hide');
                defaultValues();
            }
        }
    ) 
}


function defaultValues() {
            $('input[name="name"]').val('');
            $('input[name="nim"]').val('');
            $('input[name="email"]').val('');
                $('input[name="phone"]').val('');
                $('input[name="image"]').val('');
                $('textarea[name="about"]').val('');
}