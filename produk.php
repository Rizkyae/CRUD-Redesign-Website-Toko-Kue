<?php

require_once "config/database.php";

$keyword = $_GET['keyword'] ?? '';

if ($keyword != '') {

    $keyword_safe = mysqli_real_escape_string(
        $conn,
        $keyword
    );

    $query = mysqli_query(
        $conn,
            "SELECT * FROM produk
                WHERE kategori = 'Crypto'
                AND nama LIKE '%$keyword_safe%'
         ORDER BY id DESC"
    );

} else {

    $query = mysqli_query(
        $conn,
        "SELECT * FROM produk
         WHERE kategori = 'Crypto'
         ORDER BY id DESC"
    );
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Token Digital - APEX LEDGER</title>

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

<div class="container">

    <h1>Token Digital</h1>

    <p class="risk-note">
        Harga aset kripto dapat berubah cepat. Harga final dan ketersediaan dikonfirmasi melalui WhatsApp; informasi ini bukan saran investasi.
    </p>

    <div class="card">

        <form method="GET">

            <input
                type="text"
                name="keyword"
                placeholder="Cari nama token atau ticker..."
                value="<?= htmlspecialchars($keyword); ?>"
            >

            <button
                type="submit"
                class="btn"
            >
                Cari
            </button>

        </form>

    </div>

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
                <?= htmlspecialchars($row['deskripsi']); ?>
            </p>

            <h3>
                Harga mengikuti pasar
            </h3>

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
                <h3>Token tidak ditemukan</h3>
                <p>Coba kata kunci lain atau jelajahi semua token.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<script src="assets/product-effects.js" defer></script>

</body>

</html>