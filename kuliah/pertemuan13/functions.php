<?php 

function koneksi() {
    $conn = mysqli_connect('localhost', 'root', '', 'pw2022_a_213040021') or die('KONEKSI GAGAL!');

    return $conn;
}


function query($query) {
    $conn = koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

    return $rows;
}

function tambah($data) {
    $conn = koneksi();
    // apakah user tidak memilih gambar
    if($_FILES["gambar"]["error"] === 4) {
    // Beri gambar default
      $gambar = 'foto5';
    } else {
      // Lakukan Fungsi Upload
      $gambar = upload();
      // check jika upload gagal
      if(!$gambar) {
        return false;
      }
    }

    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    // $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO 
                mahasiswa 
              VALUES
                (null, '$npm', '$nama', '$email', '$jurusan', '$gambar')"; 

    mysqli_query($conn, $query)  or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function hapus($id) {
  $conn = koneksi();
  
  // query mahasiswa berdasarkan id
  $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
  // Hapus gambar 
  unlink('img/' , $mhs["gambar"]);
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id" ) or die (mysqli_error($conn));

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data) {
  $conn = koneksi();

  $id = $data["id"];
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE mahasiswa SET
                npm = '$npm',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
              "; 

    mysqli_query($conn, $query)  or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function upload() {
  // siapkan data gambar
  $filename = $_FILES["gambar"]["name"];
  $filetmpname = $_FILES["gambar"]["tmp_name"];
  $filesize = $_FILES["gambar"]["size"];
  $filetype = pathinfo($filename, PATHINFO_EXTENSION);
  $allowedtype = ["jpg", "jpeg", "png"];

  // Check apakah file bukan gambar
  if(!in_array($filetype, $allowedtype)) {
    echo "<script>
                alert('YANG BENER ATUH KALO APLOD TEH');
          </script>";
    return false;
  }
  // Check jika gambar terlalu besar 
  if($filesize > 1000000) {
    echo "<script>
                alert('ITU UKURAN FILE NYA TERLALU BADAG, HAYANG DIGABUK??');
          </script>";
    return false;
  }

  // proses upload gambar
  $newfilename = uniqid() . $filename;
  move_uploaded_file($filetmpname, 'img/' . $newfilename);
  
  return $newfilename;
}