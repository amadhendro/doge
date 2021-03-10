<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5></h5>
    <script>
    var date = new Date(); 
    let data = {
        'token' : date,
    };

    fetch('action.php',{
                method : 'POST',
                headers : {
                    'Content-type' : 'application/json'
                },
                body : JSON.stringify(data)			
            }
        )
        .then(response => response.text())
        .then(result => {
            console.log(result)
            document.getElement("h5").html = result.mcode
        })
        .catch(err => console.log(err));
    </script>
</body>
</html>