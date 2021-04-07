$.ajax(
    {
        type: "GET",
        data: '',
        url : 'getData.php',
        success: function (result) {
            console.log(result);
        }
    }
);
