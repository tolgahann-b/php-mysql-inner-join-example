<?php
$conn = mysqli_connect("localhost", "root", "", "odev_db");
if (!$conn) { die("Bağlantı hatası: " . mysqli_connect_error()); }
mysqli_set_charset($conn, "utf8");

$sonuc_kategoriler = mysqli_query($conn, "SELECT * FROM kategoriler");

$secilen_id = null;
$sonuc_urunler = null;
$kategori_bulundu = false;

if (isset($_GET['kategori_id']) && $_GET['kategori_id'] !== '') {
    $secilen_id = intval($_GET['kategori_id']);
    $kontrol = mysqli_query($conn, "SELECT kategori_adi FROM kategoriler WHERE kategori_id = $secilen_id");
    if (mysqli_num_rows($kontrol) > 0) {
        $kategori_bulundu = true;
        $kategori_satir = mysqli_fetch_assoc($kontrol);
        $sonuc_urunler = mysqli_query($conn, 
            "SELECT urunler.*, kategoriler.kategori_adi 
             FROM urunler 
             INNER JOIN kategoriler ON urunler.kategori_id = kategoriler.kategori_id
             WHERE urunler.kategori_id = $secilen_id");
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Tablo İlişkilendirme Ödevi</title>
</head>
<body>

<h2>Kategoriler Tablosu</h2>
<table border="1">
    <tr>
        <th>Kategori ID (PK)</th>
        <th>Kategori Adı</th>
    </tr>
    <?php while ($satir = mysqli_fetch_assoc($sonuc_kategoriler)): ?>
    <tr>
        <td><?php echo $satir['kategori_id']; ?></td>
        <td><?php echo $satir['kategori_adi']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<form method="GET">
    <label>Kategori ID girin:</label>
    <input type="number" name="kategori_id" min="1" value="<?php echo $secilen_id ? $secilen_id : ''; ?>">
    <button type="submit">Ürünleri Getir</button>
</form>

<?php if ($secilen_id !== null): ?>
    <?php if (!$kategori_bulundu): ?>
        <p>Kategori ID <?php echo $secilen_id; ?> bulunamadı!</p>
    <?php elseif (mysqli_num_rows($sonuc_urunler) == 0): ?>
        <p>"<?php echo $kategori_satir['kategori_adi']; ?>" kategorisinde ürün yok.</p>
    <?php else: ?>
        <h2>"<?php echo $kategori_satir['kategori_adi']; ?>" Kategorisindeki Ürünler</h2>
        <table border="1">
            <tr>
                <th>Ürün ID (PK)</th>
                <th>Ürün Adı</th>
                <th>Fiyat</th>
                <th>Kategori (FK)</th>
            </tr>
            <?php while ($satir = mysqli_fetch_assoc($sonuc_urunler)): ?>
            <tr>
                <td><?php echo $satir['urun_id']; ?></td>
                <td><?php echo $satir['urun_adi']; ?></td>
                <td><?php echo $satir['fiyat']; ?></td>
                <td><?php echo $satir['kategori_adi']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
<?php endif; ?>

<?php mysqli_close($conn); ?>
</body>
</html>
