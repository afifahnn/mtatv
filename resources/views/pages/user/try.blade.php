<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Populer</title>
</head>
<body>
<div class="container">
    <h1>Video Populer</h1>
    <div class="videos">
        <!-- resources/views/youtube/index.blade.php -->

        <?php
        $apiKey = 'AIzaSyA3PMtddpR2170ObfBJzJwGcMqEPYWXP_I';
        $channelId = 'UC1ZobjxMwDBcUcbIz6F5VA'; // ID dari saluran YouTube yang ingin Anda ambil videonya

        $apiUrl = 'https://www.googleapis.com/youtube/v3/search?key=' . $apiKey . '&channelId=' . $channelId . '&part=snippet,id&order=viewCount&maxResults=10';

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        // Pengecekan struktur respons dan properti
        // Misalnya:
        if (isset($data['items'][0]['snippet']['viewCount'])) {
            // Properti 'viewCount' tersedia
            // Lakukan perulangan untuk menampilkan setiap video
            foreach ($data['items'] as $video) {
                echo '<div class="video">';
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video['id']['videoId'] . '" frameborder="0" allowfullscreen></iframe>';
                echo '<p>Judul: ' . $video['snippet']['title'] . '</p>';
                echo '<p>Jumlah Views: ' . $video['snippet']['viewCount'] . '</p>';
                echo '</div>';
            }
        } else {
            // Properti 'viewCount' tidak tersedia di item pertama
            // Lakukan penanganan kesalahan atau tindakan lainnya
            echo 'Data tidak tersedia';
        }
        ?>
    </div>
</div>
</body>
</html>
