<?php 
require "koneksi.php";

$query = mysqli_query($con, "SELECT * FROM destinasi_wisata");
$destinasiWisata = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h1>VisitTemanggung</h1>
        </div>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="destinasi-wisata.php">Destinasi Wisata</a></li>
            <li><a href="kuliner.html">Kuliner</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox" name="" id="" />
              <span></span>
              <span></span>
              <span></span>
    </nav>
    <div class="destinasiWisata__Card">
    <?php if ($destinasiWisata == 0) { ?>
            <h3>Tidak ada produk untuk ditampilkan</h3>
        
        <?php 
        }else {
            $destinasiWisata = 1;
            while ($data = mysqli_fetch_array($query)) {
        ?>
                <div class="card">
                <img
                class="card__background"
                src="images/<?php echo $data['url_foto'];?>"
                alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
                width="1920"
                height="2193"
                />
                <div class="card__content | flow">
                <div class="card__content--container | flow">
                    <h2 class="card__title"><?php echo $data['nama']; ?></h2>
                    <p class="card__description" style="word-wrap: break-word"><?php echo $data['deskripsi']?></p>
                </div>
                <button class="card__button" role="button"><a href="detail-wisata.php?nama=<?php echo $data['nama']; ?>">Baca Selengkapnya</a></button>
                </div>
            </div>
            <?php 
            $destinasiWisata++;
        }}
            ?>
    </div>
    <footer>
        <div class="footer-content">
        <div class="footer-logo">
              <img src="images/logotmng.png" alt="">
          </div>
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Temanggung adalah sebuah kecamatan sekaligus menjadi ibu kota kabupaten di Kabupaten Temanggung, Provinsi Jawa Tengah, Indonesia.</p>
          </div>
          <div class="footer-section">
              <h3>Contact Us</h3>
              <p>Email: VisitTemanggung@gmail.com</p>
              <p>Phone: +62 8312 3456 700</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="social-link">Instagram</a>
                </div>
                <div class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="social-link">Facebook</a>
                </div>
                <div class="social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="#" class="social-link">Twitter</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>