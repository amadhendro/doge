<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="balance"></p>

    <script>
        fetch('core.php')
        .then(response => response.json())
        .then(
            result => {
                console.log(result)
                sessionStorage.setItem('token', result.SessionCookie)
            }
        );
        sessionStorage.setItem('balance', 12)
        var balance_one = sessionStorage.getItem('balance');
        if(!balance_one){
            console.log(0)
        } else {
            console.log(1)
        }
        // setInterval(() => {
           
        //     fetch('core_child.php',{
        //             method : 'POST',
        //             headers : {
        //                 'Content-type' : 'application/json'
        //             },
        //             body : JSON.stringify({
        //                 "token": sessionStorage.getItem('token')
        //             });		
        //         }
        //     )
        //     .then(response => response.text())
        //     .then(res => {
        //         var result = JSON.parse(res);

        //         console.log(result)
        //         document.getElementById('balance').innerHTML = result.StartingBalance;
        //     })
        //     .catch(err => console.log(err));
        // },4000);
    </script>
</body>
</html>