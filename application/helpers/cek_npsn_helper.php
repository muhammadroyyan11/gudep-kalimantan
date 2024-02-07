<?php

function CekNpsn($npsn)
{
    $url = "https://referensi.data.kemdikbud.go.id/pendidikan/cari/{$npsn}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);

    $start = strpos($content, 'data.push([1, linknpsn,') + strlen('data.push([1, linknpsn,');
    $end = strpos($content, ']', $start);
    $text = substr($content, $start, $end - $start);

    // Extracting the school name without quotes
    $parts = explode(',', $text);
    $schoolName = trim($parts[0], ' "');

    if (stripos($text, 'Kab. Bulungan') !== false) {
        if (empty($schoolName)) {
            return "NPSN TIDAK DITEMUKAN";
        } else {
            return $schoolName;
        }
    } else {
        return "Data tidak valid";
    }
}