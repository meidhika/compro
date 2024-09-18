<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9fa;
            margin: 0;
            padding: 0;
        }

        .card {
            width: 600px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: row;
            border: none;
        }

        .user-profile {
            background: linear-gradient(to right, #ee5a6f, #f29263);
            color: white;
            padding: 20px;
            width: 40%;
            text-align: center;
        }

        .user-profile img {
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .user-profile h6 {
            font-size: 18px;
            margin: 10px 0;
        }

        .user-profile p {
            font-size: 14px;
        }

        .user-profile i {
            font-size: 16px;
        }

        .card-content {
            padding: 20px;
            width: 60%;
        }

        .card-content h6 {
            font-size: 16px;
            margin-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 5px;
        }

        .card-content .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-content .info div {
            width: 45%;
        }

        .card-content .info p {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }

        .card-content .info h6 {
            margin: 5px 0;
            font-size: 14px;
            color: #919aa3;
            font-weight: 400;
        }

        .card-content .social-links {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
        }

        .card-content .social-links a {
            font-size: 20px;
            margin-right: 15px;
            text-decoration: none;
            color: #000;
        }

        #colorp,
        #colorh6 {
            color: #f29263;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="user-profile">
            <img src="https://img.icons8.com/bubbles/100/000000/user.png" alt="User-Profile-Image">
            <h6 id="colorh6">{{ isset($data) ? $data->nama_lengkap : "Tidak Ada Nama" }}</h6>
            <p id="colorp">Web Designer</p>
            <i class="mdi mdi-square-edit-outline feather icon-edit"></i>
        </div>
        <div class="card-content">
            <h6>Information</h6>
            <div class="info">
                <div>
                    <p>Email</p>
                    <h6>{{ isset($data) ? $data->email : "Tidak Ada Email" }}</h6>
                </div>
                <div>
                    <p>Phone</p>
                    <h6>{{ isset($data) ? "(+62) ". $data->no_telpon : "Tidak Ada Nomor Telpon" }}</h6>
                </div>
            </div>
            <h6>Experiences</h6>
            <div class="info">
                @foreach ($experience as $item)
                <div>
                    <p>{{ isset($item->judul) ? $item->judul : 'Tidak ada pengalaman' }}</p>
                    <h6>{{ isset($item->sub_judul) ? $item->sub_judul : 'Tidak ada perusahaan' }}</h6>
                    <p>{{ isset($item->deskripsi) ? $item->deskripsi : 'Tidak ada descriptions' }}</p>
                </div>
                @endforeach
                <div>
                </div>
                <div class="social-links">
                    <a href="#" title="facebook"><i class="mdi mdi-facebook feather icon-facebook"></i></a>
                    <a href="#" title="twitter"><i class="mdi mdi-twitter feather icon-twitter"></i></a>
                    <a href="#" title="instagram"><i class="mdi mdi-instagram feather icon-instagram"></i></a>
                </div>
            </div>
        </div>
</body>

</html>