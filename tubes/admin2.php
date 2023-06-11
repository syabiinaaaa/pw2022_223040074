<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmlane";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah kategori berhasil ditambahkan
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}

// Mengambil data kategori dari database
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result === false) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Mengubah data hasil query menjadi array asosiatif
$category = $result->fetch_all(MYSQLI_ASSOC);

// Menghapus kategori jika ada parameter hapus yang diterima melalui URL
// if (isset($_GET['hapus'])) {
//     $categoryId = $_GET['hapus'];
//     deleteCategory($categoryId);
// }

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menghapus kategori
function deleteCategory($categoryId)
{
    global $conn;

    // Menghapus data kategori
    $deleteMoviesQuery = "DELETE FROM movies WHERE category_id = ?";
    $deleteCategoryQuery = "DELETE FROM category WHERE id = ?";

    // Menggunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare($deleteMoviesQuery);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();

    $stmt = $conn->prepare($deleteCategoryQuery);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();

    echo "Kategori berhasil dihapus.";
}



// Contoh pemanggilan fungsi deleteCategory dengan parameter 1
deleteCategory(1);

// Menutup koneksi
$conn->close();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FilmLane - Admin page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style3.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script>
        // Script JavaScript untuk menampilkan alert popup
        <?php if (isset($success) && $success) : ?>
            window.onload = function() {
                alert("Kategori berhasil ditambahkan.");
            };
        <?php endif; ?>
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark mx-auto">
        <div class="container">
            <a href="admin1.php" class="fw-bold fst-italic align-middle navbar-brand">Filmlane</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <a href="admin1.php" class="nav-item nav-link page-scroll">
                        <button type="button" class="btn btn-2"><i class="bi bi-film"> Movies</i></button></a>
                    <a href="index.php" class="nav-item nav-link page-scroll">
                        <button type="button" class="btn btn-2"><i class="bi bi bi-people-fill"></i> User Page</button>
                    </a>
                    <a href="logout.php" class="nav-item nav-link page-scroll">
                        <button type="button" class="btn btn-1"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- admin -->
    <section id="admin" class="my-5 container justify-content-center">
        <h1 class="text-center display-8 fw-bold mb-3">FilmLane's Database</h1>

        <!-- Action Bar -->
        <form action="" method="POST" class="mb-3">
            <!-- Searching -->
            <input type="text" name="keyword" size="30" placeholder="Search" autocomplete="off" autofocus>
            <button type="submit" name="cari" class="btn btn-secondary">Search</button>
            <!-- add -->
            <a href="tambahKategori.php" class="btn btn-primary float-sm-end"><i class="bi bi-plus-circle"></i> Add Movie</a>
        </form>

        <!-- tabel database -->
        <table class="table table-sm align-middle table-bordered table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col" width="30">#</th>
                    <th scope="col">name</th>
                    <th scope="col">category</th>
                    <th scope="col">description</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (!empty($category)) : ?>
                    <?php foreach ($category as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $c["name"] ?></td>
                            <td><?= $c["description"] ?></td>
                            <td>
                                <a href="ubah-kategori.php?id=<?= $c["id"]; ?>">ubah</a> |
                                <a href="admin2.php?hapus=<?= $c["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>

                            </td>
                        </tr>
                    <?php
                        $i++;
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No category found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
</body>

</html>