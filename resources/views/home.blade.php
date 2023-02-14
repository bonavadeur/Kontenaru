<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="resources/image/logo.png"/>
    <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/bootstrap.css" rel="stylesheet">
    <title>Kontenaru</title>
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col">
                <img src="resources/image/kontenaru.png" style="width:100%">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <textarea class="form-control" placeholder="Nhập đoạn code cần chạy vào đây" id="input" style="height: 400px"></textarea>
                <button type="button" class="btn btn-danger" id="submit">Chạy code</button>
                <!-- <label for="floatingTextarea2">Comments</label> -->
            </div>

            <div class="col-6">
                <label for="result">Kết quả</label>
                <textarea class="form-control" id="result" style="height: 380px;" readonly>
                </textarea>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
            <div class="col-8">
                <label for="result">Kết quả</label>
                <textarea class="form-control" id="result" style="height: 150px;" readonly>
                </textarea>
            </div>
        </div> -->
    </div>

    <script type="text/javascript" src="resources/js/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $("#submit").click(function() {
            $("#result").text("Chờ xíu nha đang chạy sắp xong òy . . . >o<''");
            body = {
                input: $("#input").val(),
                id: Math.round(Math.random() * 10000)
            };
            // console.log(body);
            body = JSON.stringify(body)
            fetch("/api/exec", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: body
                }).then(response => {
                    return response.json();
                }).then(result => {
                    console.log(result);
                    $("#result").text(result);
                });
        });
    </script>
</body>
</html>