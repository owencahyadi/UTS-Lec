<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Leblanc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/menu.css">
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
                <?php
                    session_start();
                    if(!isset($_SESSION['iduser'])){
                        echo "<form action='login.php'>";
                            echo "<button type='submit' class='btn btn-outline-success'>Login</button>";
                        echo "</form>";
                    }else{
                        echo "<form action='logout.php'>";
                            echo "<button type='submit' class='btn btn-outline-danger'>Logout</button>";
                        echo "</form>";
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="title mt-4 mb-1" id="title">Menu</h1>
        <?php
        
        if(!isset($_SESSION['username']) && !isset($_SESSION['iduser'])){
            echo "You dont have access to this page";
        }else{
        ?>
        <div class="row filter-btn-row">
			<div class="col-lg-12 mb-5">
				<a data-filter="all" class="btn btn-outline-warning filter-btn active">All</a>
				<a data-filter="seasonalMenu" class="btn btn-outline-warning filter-btn">Seasonal Menu</a>
				<a data-filter="waffle" class="btn btn-outline-warning filter-btn">Waffle</a>
				<a data-filter="dessert" class="btn btn-outline-warning filter-btn">Dessert</a>
				<a data-filter="lunch" class="btn btn-outline-warning filter-btn">Lunch</a>
				<a data-filter="food" class="btn btn-outline-warning filter-btn">Food</a>
				<a data-filter="morning" class="btn btn-outline-warning filter-btn">Morning</a>
				<a data-filter="coffee" class="btn btn-outline-warning filter-btn">Coffee</a>
				<a data-filter="tea" class="btn btn-outline-warning filter-btn">Tea</a>
				<a data-filter="softdrink" class="btn btn-outline-warning filter-btn">Softdrink</a>
                <a data-filter="alcohol" class="btn btn-outline-warning filter-btn">Alcohol</a>
			</div>
		</div>
        <?php
            $koneksi = mysqli_connect("localhost", "root", "", "restoran", 3308);

            $query = "SELECT * FROM menu WHERE kategori = 'seasonalMenu'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mb-5">Seasonal Menu</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-md-center">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col mb-5">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="seasonalMenu">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'waffle'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mb-5">Waffel</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center h-100" style="width: 18rem;" data-filter="waffle">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'dessert'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Dessert</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="dessert">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'lunch'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Lunch</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="lunch">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'food'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Food</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="food">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'morning'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Morning</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="morning">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'coffee'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Coffee</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="coffee">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'tea'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Tea</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="tea">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'softdrink'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">SoftDrink</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="softdrink">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            $query = "SELECT * FROM menu WHERE kategori = 'alcohol'";
            $result = mysqli_query($koneksi, $query);
            echo '<h2 class="menuTitle text-center mt-5 mb-5">Alcohol</h2>';
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo'<div class="col">';
                    echo'<div class="card text-center" style="width: 18rem;" data-filter="alcohol">';
                        echo '<div class="card-image-container">';
                            echo '<img src="' . $row['foto'] . '" class="card-img-top mx-auto" alt="">';
                        echo '</div>';
                        echo '<div class="card-body">';
                            echo '<p class="card-text">' . $row['namamenu'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            mysqli_close($koneksi);
        }
        ?>
        

    </div>

    <script src="js/menu.js"></script>
</body>
</html>