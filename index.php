<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4 id="finish"></h4>
    <p id="balance"></p>

    <button type="button" id="start" onclick="return start(1)">
        Start
    </button>

    <script>

        function start(start){

            sessionStorage.removeItem('balance');
            sessionStorage.removeItem('token');
            sessionStorage.setItem('stop', start)
            document.getElementById('start').style.display = "none"
            fetch('core.php')
            .then(response => response.json())
            .then(
                result => {
                    console.log(result)
                    sessionStorage.setItem('token', result.SessionCookie)
                }
            );

            var interval = setInterval(() => {
            
                fetch('core_child.php',{
                        method : 'POST',
                        headers : {
                            'Content-type' : 'application/json'
                        },
                        body : JSON.stringify({
                            "token": sessionStorage.getItem('token')
                        })
                    }
                )
                .then(response => response.text())
                .then(res => {
                    var result = JSON.parse(res);
                    
                    var balance_one = sessionStorage.getItem('balance');
                    if(!balance_one){
                        sessionStorage.setItem('balance', result.StartingBalance)
                    } else {
                        var startBalance = sessionStorage.getItem('balance');
                        var percen = sessionStorage.getItem('stop');
                        var stopBalance = (startBalance * (percen/100))
                        console.log(parseInt(stopBalance))
                        console.log(result.StartingBalance)
                        if(result.StartingBalance == stopBalance){
                            console.log("Kalah")
                            clearInt();
                            document.getElementById('finish').innerHTML = stopBalance;
                        }
                    }
                    console.log(result)
                    document.getElementById('balance').innerHTML = result.StartingBalance;
                })
                .catch(err => console.log(err));
            },7000);

            function clearInt(){
                clearTimeout(interval)
            }
        }

    </script>
</body>
</html>