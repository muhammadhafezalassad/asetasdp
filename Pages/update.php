<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"href="css/formulir.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php 
include "../koneksi.php";
$sql = mysqli_query($koneksi, "SELECT * FROM penempatan WHERE nomor_barang='$_GET[kode]'");
$data = mysqli_fetch_array($sql);

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "update penempatan set
    nama_barang = '$_POST[nama_barang]',
    tahun_perolehan = '$_POST[tahun_perolehan]',
    grup = '$_POST[grup]',
    kategori = '$_POST[kategori]',
    kelas = '$_POST[kelas]',
    sub_kelas = '$_POST[sub_kelas]',
    nomor_urut = '$_POST[nomor_urut]',
    kode_aset = '$_POST[kode_aset]',
    qr_code = '$_POST[qr_code]',
    kode_telkom = '$_POST[kode_telkom]',
    serial_number = '$_POST[serial_number]'
    where nomor = '$_GET[kode]'");

    echo "<script>swal({
        title: 'Berhasil',
        text: 'Barang Diubah!',
        icon: 'success',
        button: false,
        timer: 2000,
    }).then(function() {
        window.location='penempatan.php';
    });
    </script>"; 
   

}

?>

    <section class="home" id="home">
    <h1 class="text"><b>Update Data Penempatan Barang</b><br>Fasiltas Pendukung</h1>
    <div class="container">
    <form action="#" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title"><b>Detail Barang</b></span>

                    
                    <div class="fields">
                        

                    <div class="input-field">
                            <label>No</label>
                            <input type="text" name="nomor" placeholder="Masukkan Nomor" autocomplete="off" required>
                        </div>


                        <div class="input-field">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off" required>
                        </div>

                        <div class="input-field">
                            <label>Tahun Perolehan</label>
                            <input type="text" name="tahun_perolehan" placeholder="Masukkan Tahun Perolehan" autocomplete="off" required>
                        </div>

                        <div class="input-field">
                            <label>Kategori</label>
                            <input type="text" name="kategori" placeholder="Masukkan Kategori" autocomplete="off" required>
                        </div>

                        <div class="input-field">
                            <label>Grup</label>
                            <input type="text" name="grup" placeholder="Masukkan Grup" autocomplete="off" required>
                        </div>

                        <div class="input-field">
                            <label>Kelas</label>
                            <input type="number" name="kelas" placeholder="Masukkan Kelas" autocomplete="off" required>
                        </div>

                        <div class="input-field">
                            <label>Sub-Kelas</label>
                            <input type="number" name="sub_kelas" placeholder="Masukkan sub_kelas" autocomplete="off" required>
                        </div>
                        
                        
                        <div class="input-field">
                            <label>Nomor Urut</label>
                            <input type="text" name="nomor_urut" placeholder="Masukkan Nomor Urut" autocomplete="off">
                        </div>


                        <div class="input-field">
                            <label>Kode Asset</label>
                            <input type="text" name="kode_aset" placeholder="Masukkan Kode Asset" autocomplete="off">
                        </div>


                        <div class="input-field">
                            <label>QR Code</label>
                            <input type="text" name="qr_code" placeholder="Masukkan QR Code" autocomplete="off">
                        </div>


                        <div class="input-field">
                            <label>Kode Telkom</label>
                            <input type="text" name="kode_telkom" placeholder="Masukkan Kode Telkom" autocomplete="off">
                        </div>


                        <div class="input-field">
                            <label>Serial Number</label>
                            <input type="text" name="serial_number" placeholder="Masukkan Serial Number" autocomplete="off">
                        </div>
                        
                      
                        
                    </div>
                    
                    
                </div>
                

                

                    <div class="buttons">
                        
                        
                        <div class="backBtn">
                        
                        <button onclick="location.href='penempatan.php'" type="button" id="button">
                        <i class='bx bxs-left-arrow-square' ></i>
                            Kembali
                        </button>
  
                        </div>
                       
                        <div class="backBtn">
                        <button  type="submit" name="proses">
                        <i class='bx bxs-save' ></i>
                            Simpan
                        </button>
                        </div>
                    </div>
                </div> 
            </div>
        </form>


            
        </div>
        
  
</section>



   

</body>
<script>
    const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
    
      

      function dipilih (pilihan, kondisi){
        var pilihan = document.getElementById('pilihan');
        var kondisi = document.getElementById('non');
        if(pilihan.value == "Pengeluaran Sementara Barang"){
            classList.toggle("pengeluaran");
        }
      }



toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});


    </script>
</html>

<?php
}else{
     header("Location: index.php");
     exit();
}
?>
