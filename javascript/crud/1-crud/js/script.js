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
            let no = 1;
            $.each(objResult, function(key,val) {
                const newLine = $("<tr>");
                
                newLine.html(`<td>${no}</td>
                            <td>${val.name}</td>
                            <td>${val.nim}</td>
                            <td>${val.number}</td>`
                            );
                var dataHandler = $("#data");
                dataHandler.append(newLine);
                no++;
            });
        }
    }
);
