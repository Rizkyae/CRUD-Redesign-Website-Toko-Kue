<?php

require_once "config/database.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     WHERE kategori = 'Crypto'
     ORDER BY id DESC
     LIMIT 6"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>APEX LEDGER - Token Digital</title>

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

        <a href="tentang.php">
            Tentang Kami
        </a>

    </div>

</div>

<section class="hero">

    <div class="container">

        <h1>
            APEX LEDGER
        </h1>

        <p>
            Jelajahi aset digital populer dalam satu ledger.
        </p>

        <a
            href="produk.php"
            class="btn"
        >
            Jelajahi Token
        </a>

    </div>

</section>

<div class="container">

    <h2>Token Pilihan</h2>

    <p class="risk-note">
        Harga mengikuti pasar dan dapat berubah. Permintaan pembelian dikonfirmasi melalui WhatsApp.
    </p>

    <div class="grid">

        <?php while ($row = mysqli_fetch_assoc($query)): ?>

        <div class="card token-card">

            <?php preg_match('/\(([^)]+)\)$/', $row['nama'], $ticker_match); ?>
            <div class="token-coin" aria-hidden="true">
                <?= htmlspecialchars($ticker_match[1] ?? 'AL'); ?>
            </div>

            <h3>
                <?= htmlspecialchars($row['nama']); ?>
            </h3>

            <p>
                Aset digital
            </p>

            <strong>
                Harga mengikuti pasar
            </strong>

            <br><br>

            <a
                href="detail.php?id=<?= $row['id']; ?>"
                class="btn"
            >
                Lihat Token
            </a>

        </div>

        <?php endwhile; ?>

        <?php if (mysqli_num_rows($query) === 0): ?>
            <div class="card empty-state">
                <h3>Token sedang disiapkan</h3>
                <p>Impor data produk dari <code>toko_kue.sql</code> untuk menampilkan katalog token.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<script src="assets/product-effects.js" defer></script>

</body>

</html>