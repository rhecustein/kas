<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Transaksi | {{config('app.name')}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: #ffffff;
        }
				.title{
					font-size:15px;
					font-weight:bold;
				}
        .content {
            padding: 20px;
            text-align: center;
        }
        .text{
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            color: #777777;
            font-size: 12px;
        }
        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Verifikasi Transaksi | {{config('app.name')}}</h1>
        </div>
        <div class="content">
            <p class="text">Terimakasih {{$name}}  , Transaksi anda telah disetujui</p>
        </div>
        <div class="footer">
            <p>Silahkan login ke website untuk cek detail transaksi.</p>
        </div>
    </div>
</body>
</html>
