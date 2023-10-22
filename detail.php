 <?php
$koneksi = mysqli_connect("localhost:3303", "root", "", "restoran", 3303);

// Check if idmenu is set in the URL
if (isset($_GET['id'])) {
    $idmenu = $_GET['id'];

    // Fetch menu item details from the database based on idmenu
    $query = "SELECT * FROM menu WHERE idmenu = $idmenu";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch menu item details as an associative array
        $menuItem = mysqli_fetch_assoc($result);
    } else {
        // Handle database query error
        echo "Error fetching menu item details: " . mysqli_error($koneksi);
    }
} else {
    // Handle case when idmenu is not set in the URL
    echo "Invalid menu item ID.";
}

// Close database connection
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/detail.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Menu Detail - Leblanc</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top  bg-dark bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#title"><img src="img/logo1.png" class="leblanc" alt="Leblanc Logo"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#title">About Us</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success" type="submit">Login</button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row filter-btn-row">
        <div class="col-lg-12 mb-5">
            <a href="menu.php" class="btn filter-btn">All</a>
            <a href="menu1.php" class="btn filter-btn">Seasonal Menu</a>
            <a href="menu2.php" class="btn filter-btn">Waffle</a>
            <a href="menu3.php" class="btn filter-btn">Dessert</a>
            <a href="menu4.php" class="btn filter-btn">Lunch</a>
            <a href="menu5.php" class="btn filter-btn">Food</a>
            <a href="menu6.php" class="btn filter-btn">Morning</a>
            <a href="menu7.php" class="btn filter-btn">Coffee</a>
            <a href="menu8.php" class="btn filter-btn">Tea</a>
            <a href="menu9.php" class="btn filter-btn">Softdrink</a>
            <a href="menu10.php" class="btn filter-btn">Alcohol</a>
        </div>
    </div>
    
   

    <?php
    if(isset($_GET['id'])) {
        $itemId = $_GET['id'];

        $koneksi = mysqli_connect("localhost", "root", "", "restoran", 3303);
        $query = "SELECT * FROM menu WHERE idmenu = $itemId";
        $result = mysqli_query($koneksi, $query);
        $itemData = mysqli_fetch_assoc($result);
        mysqli_close($koneksi);
    ?>

<?php
$koneksi = mysqli_connect("localhost", "root", "", "restoran", 3303);

function getRandomColorClass() {
            $colorClasses = ["bg-color-1", "bg-color-2", "bg-color-3", "bg-color-4", "bg-color-5"]; 
            return $colorClasses[array_rand($colorClasses)];
        }

// Function to get menu item details by ID
function getMenuDataById($id) {
    global $koneksi;
    $query = "SELECT * FROM menu WHERE idmenu = $id";
    $result = mysqli_query($koneksi, $query);
    $menuData = mysqli_fetch_assoc($result);
    return $menuData;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $menuItem = getMenuDataById($id);

    if ($menuItem) {
        echo '<div class="container menuOnly aos-init aos-animate" data-aos="fade-up">';
        echo '<div class="row">';
        
        // Kolom untuk bungkus (kiri, lebih kecil dengan padding)
        echo '<div class="col-md-auto mx-auto ' . getRandomColorClass() . ' bg-card" style="padding: 20px;">';
        echo '<p class="pic"><img class="gambar" src="' . $menuItem['foto'] . '" alt="' . $menuItem['namamenu'] . '"></p>';
        echo '</div>';
        
        // Kolom untuk row (kanan, lebih besar)
        echo '<div class="col-md-6">';
        echo '<div class="menu_detailsInner">';
        echo '<div class="menu_dI_wrapper">';
        echo '<div class="nameEnWrapper">';
        echo '<h1 class="nameEn">' . $menuItem['namamenu'] . '</h1>';
        echo '</div>';
        echo '<dl class="price">';
        echo '<dt>Price: Rp. ' . number_format($menuItem['harga']) . '</dt>';
        echo '</dl>';
                
        // Letakkan cart-wrapper di bawah kiri deskripsi
        echo '<div class="menuCopy">' . $menuItem['deskripsi'];
        echo '<div class="cart-wrapper">';
        echo '<button type="button" class="button" href="#">';
        echo '<span class="button__text">Add Item</span>';
        echo '<span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>';
        echo '</button>';
        echo '</div>';  // Tutup cart-wrapper
        echo '</div>';  // Tutup menuCopy
                
    //     <button type="button" class="button" href="#">
    //     <span class="button__text">Add Item</span>
    //     <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
    //   </button>
        

        echo '</div>'; // Tutup menu_dI_wrapper
        echo '</div>'; // Tutup menu_detailsInner
        echo '</div>'; // Tutup kolom ke-2 (col-md-6)
        
        echo '</div>'; // Tutup baris (row)
        echo '</div>'; // Tutup container
        
    }
    
    
     else {
        echo 'Menu item not found.';
    }
} else {
    echo 'Invalid menu item ID.';
}



    } else {
        echo '<div class="container text-center mt-5">';
        echo '<h1>Item not found</h1>';
        echo '</div>';
    }
        $query = "SELECT * FROM menu";
        $result = mysqli_query($koneksi, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['kategori']][] = $row;
        }
        mysqli_close($koneksi);
        function generateCategoryContainer($data, $kategori) {
            echo '<div id="' . $kategori . '" class="category-container" data-aos="fade-up">';
            echo '<h2 class="menuTitle text-center mt-5 mb-5">' . ucfirst($kategori) . '</h2>'; 
            echo '<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-md-center">';
            foreach ($data[$kategori] as $row){
                $colorClass = getRandomColorClass();
                echo '<div class="col">';
                echo '<a href="detail.php?id=' . $row['idmenu'] . '">';
                echo '<div class="card text-center ' . $colorClass . ' bg-card" style="width: 18rem;" data-filter="' . $kategori . '">';
                echo '<div class="card-image-container">';
                echo '<img src="' . $row['foto'] . '" class="card-img-top" alt="">';
                echo '</div>';
                echo '<div class="card-body">';echo '</a>';
                echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
            }            
            echo '</div>';
            echo '</div>';
        }
        $kategoriArray = ["seasonalMenu", "waffle", "dessert", "lunch", "food", "morning", "coffee", "tea", "softdrink", "alcohol"];
        foreach ($kategoriArray as $kategori) {
            generateCategoryContainer($data, $kategori);
        }
        ?>
    </div>

    <script src="js/menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 2000,
        });
        AOS.refresh();
    </script>
</body>
</html> 


