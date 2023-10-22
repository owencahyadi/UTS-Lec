<?php
session_start();

// Fungsi untuk memeriksa apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Periksa apakah pengguna sudah login. Jika belum, arahkan ke halaman login.
if (!isUserLoggedIn()) {
    header('Location: login.php'); // Ganti 'login.php' dengan halaman login yang sesuai
    exit();
}

// Inisialisasi keranjang belanja (jika belum ada)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Cek apakah data dari formulir telah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah item sudah ada dalam keranjang belanja
    $itemId = $_POST['idmenu'];

    if (isset($_SESSION['cart'][$itemId])) {
        // Jika item sudah ada, tambahkan jumlahnya
        $_SESSION['cart'][$itemId]['quantity'] += 1;
    } else {
        // Jika item belum ada dalam keranjang belanja, tambahkan sebagai item baru
        $_SESSION['cart'][$itemId] = array(
            'namamenu' => $_POST['namamenu'],
            'harga' => $_POST['harga'],
            'quantity' => 1,
        );
    }
}

// Fungsi untuk menghapus item dari keranjang
function deleteItemFromCart($itemId) {
    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $itemId = $_GET['id'];
    deleteItemFromCart($itemId);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Struk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <div class="container">
        <div class="header">
            Struk Pembayaran
        </div>
        <div class="item-list">
            <div class="item">
                <div class="item-name"><strong>Nama Menu</strong></div>
                <div class="item-price"><strong>Harga</strong></div>
                <div class="item-quantity"><strong>Quantity</strong></div>
                <div class="item-subtotal"><strong>Subtotal</strong></div>
                <div class="item-actions"><strong></strong></div>
                <div class="item-back"><strong></strong></div>
            </div>
            <?php
            $totalHarga = 0;

            foreach ($_SESSION['cart'] as $itemId => $itemData) {
                $subtotal = $itemData['harga'] * $itemData['quantity'];
                $totalHarga += $subtotal;
            ?>
            <div class="item">
                <div class="item-name"><?php echo $itemData['namamenu']; ?></div>
                <div class="item-price">Rp. <?php echo number_format($itemData['harga']); ?></div>
                <div class="item-quantity"><?php echo $itemData['quantity']; ?></div>
                <div class="item-subtotal">Rp. <?php echo number_format($subtotal); ?></div>
                <div class="item-actions">
                    <a class="btn btn-danger" href="mycart.php?action=delete&id=<?php echo $itemId; ?>">Delete</a>
                </div>
                <div class="item-back">
                <a class="cssbuttons-io-button"  href="detail.php?id=<?php echo $itemId; ?>">
                        <div class="icon">
                            <svg
                            height="24"
                            width="24"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                fill="currentColor"
                            ></path>
                            </svg>
                        </div>
                        back
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="total">
            Total Harga: Rp. <?php echo number_format($totalHarga); ?>
        </div>
    </div>
</body>
</html>
