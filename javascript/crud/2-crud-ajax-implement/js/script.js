onload();


function onload() {
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
                        <td>${val.about}</td>`
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
                console.log(result);
            }
        }
    ) 

}