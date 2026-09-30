<?php

require_once "config/database.php";

$id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     WHERE id = $id"
);

$produk = mysqli_fetch_assoc($query);

if (!$produk) {

    die("Produk tidak ditemukan.");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title><?= htmlspecialchars($produk['nama']); ?> - APEX LEDGER</title>

    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="navbar">

    <div class="container">

        <a href="index.php" class="brand-lockup" aria-label="APEX LEDGER beranda">
            <span class="brand-mark" aria-hidden="true">AL</span>
            <span class="brand-name">APEX LEDGER</span>
        </a>

        <a href="produk.php">
            Produk
        </a>

    </div>

</div>

<div class="container">

    <div class="card">

        <?php if ($produk['gambar']): ?>

            <?php preg_match('/\(([^)]+)\)$/', $produk['nama'], $ticker_match); ?>
            <div class="token-coin token-coin-large" aria-hidden="true">
                <?= htmlspecialchars($ticker_match[1] ?? 'AL'); ?>
            </div>

        <?php endif; ?>

        <h1>
            <?= htmlspecialchars($produk['nama']); ?>
        </h1>

        <p>
            Kategori:
            <?= htmlspecialchars($produk['kategori']); ?>
        </p>

        <p>
            <?= nl2br(
                htmlspecialchars($produk['deskripsi'])
            ); ?>
        </p>

        <h2>
            Harga mengikuti pasar
        </h2>

        <p>
            Harga final dan ketersediaan akan dikonfirmasi melalui WhatsApp.
        </p>

        <p class="risk-note">
            Aset kripto memiliki risiko fluktuasi harga. Informasi ini bukan saran investasi. Pastikan Anda memahami risiko dan memeriksa ketentuan penyedia sebelum melanjutkan.
        </p>

        <?php
        $whatsapp_message = rawurlencode(
            'Halo APEX LEDGER, saya tertarik dengan ' . $produk['nama'] .
            '. Mohon info harga terkini, ketersediaan, dan cara pembelian.'
        );
        ?>

        <a
            href="https://wa.me/6281357441144?text=<?= $whatsapp_message; ?>"
            class="btn btn-buy"
            target="_blank"
            rel="noopener noreferrer"
        >
            Buy Now via WhatsApp
        </a>

        <a
            href="produk.php"
            class="btn"
        >
            Kembali
        </a>

    </div>

</div>

</body>

</html>