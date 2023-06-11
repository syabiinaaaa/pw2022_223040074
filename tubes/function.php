<?php
// koneksi ke database
$conn = mysqli_connect('localhost:3306', 'root', '');
mysqli_select_db($conn, "filmlane");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["name"]);
    $category_id = htmlspecialchars($data["category"]); // Ubah nama variabel menjadi $category_id
    $language = htmlspecialchars($data["language"]);
    $year = htmlspecialchars($data["year"]);
    $hour = htmlspecialchars($data["hour"]);
    $storyline = htmlspecialchars($data["storyline"]);
    $Rating = htmlspecialchars($data["Rating"]);
    $Quality = htmlspecialchars($data["Quality"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query untuk menambah data film ke database
    $query = "INSERT INTO movies (name, category_id, language, year, hour, storyline, Rating, Quality, gambar)
              VALUES ('$name', '$category_id', '$language', '$year', '$hour', '$storyline', '$Rating', '$Quality', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function tambahKategori($nama, $deskripsi)
{
    global $conn;

    // Cek apakah kategori sudah ada di tabel category
    $query = "SELECT id FROM category WHERE name = '$nama'";
    $result = mysqli_query($conn, $query);

    // Jika kategori belum ada, tambahkan ke tabel category
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO category (name, description) VALUES ('$nama', '$deskripsi')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}



function upload()
{
    // Cek apakah input file 'gambar' ada
    if (!isset($_FILES['gambar'])) {
        var_dump($_FILES['gambar']);
        return "Gambar tidak ditemukan";
    }

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        return "Pilih gambar terlebih dahulu";
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        return "Yang Anda upload bukan gambar";
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranfile > 50000000) {
        return "Ukuran gambar terlalu besar";
    }

    // Lolos pengecekan, gambar siap diupload
    // Generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, '../tubes/assets/images/' . $namafilebaru);

    return $namafilebaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM movies WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data['id'];
    $name = htmlspecialchars($data['name']);
    $language = htmlspecialchars($data['language']);
    $hour = htmlspecialchars($data['hour']);
    $year = htmlspecialchars($data['year']);
    $storyline = htmlspecialchars($data['storyline']);
    $category = htmlspecialchars($data['category']);
    $Rating = htmlspecialchars($data['Rating']);
    $Quality = htmlspecialchars($data['Quality']);
    $gambarlama = htmlspecialchars($data["gambarlama"] ?? '');

    // cek apakah user pilih gambar baru atau tidak
    $gambar = $gambarlama;
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] !== 4) {
        $gambar = upload();
    }

    // Query update data
    $query = "UPDATE movies SET 
              name = '$name',
              language = '$language',
              hour = '$hour',
              year = '$year',
              storyline = '$storyline',
              category_id = '$category',
              Rating = '$Rating',
              Quality = '$Quality',
              gambar = CASE
                            WHEN '$gambar' = '$gambarlama' THEN gambar
                            ELSE '$gambar'
                         END 
            WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
