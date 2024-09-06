<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {



header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=penempatan.xls"); 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <table>
        <tbody>
            <tr >
            <td></td>
            <td > PT. ASDP Indonesia Ferry Persero<br>.............................(1)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td></td>
            <td > FP 1<br>No: .............................(2)</td>
            </tr>
        </tbody>
    
</table>
    <h2 style="        text-align: center;
        align-items: center;
        font-size: 24px;">Dokumen Penempatan Barang<br style="font-style: italic;">( Fasilitas Pendukung )
        </h2>

    <table class="content-table" style="width:100%;margin: 10px 0;border-radius: 1px;
    
    align-items: center;
    text-align: center; border: 1px solid #000000;">
            <thead >
                <tr style="border: 1px solid #000000;">
                    <th>Nomor</th>  
                    <th>Nama Barang</th>
                    <th>Tahun Perolehan</th>
                    <th>Grup</th>
                    <th>Kategori</th>
                    <th>Kelas</th>
                    <th>Sub Kelas</th>
                    <th>Nomor Urut</th>
                    <th>Kode Aset</th>
                    <th>QR Code</th>
                    <th>Kode Telkom</th>
                    <th>Serial Number</th>
                </tr>
                
            </thead>
            <tbody>
            <tr style="text-align: center;
        align-items: center; border: 1px solid #000000;">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>

                </tr>
            <?php 
            
            include"koneksi.php";
            $urutan = 1;
            $ambildata = mysqli_query($koneksi, "SELECT * FROM penempatan");
            while($tampil = mysqli_fetch_array($ambildata)){
                $nomor = $tampil['nomor'];
                $nama_barang = $tampil['nama_barang'];
                $tahun_perolehan = $tampil['tahun_perolehan'];
                $grup = $tampil['grup'];
                $kategori = $tampil['kategori'];
                $kelas = $tampil['kelas'];
                $sub_kelas = $tampil['sub_kelas'];
                $nomor_urut = $tampil['nomor_urut'];
                $kode_aset = $tampil['kode_aset'];
                $qr_code = $tampil['qr_code'];
                $kode_telkom = $tampil['kode_telkom'];
                $serial_number = $tampil['serial_number'];
                ?>    
                <tr style="text-align: center;
        align-items: center; border-left: 1px solid #000000;">
                <td style="width:12%"><?php echo $nomor ?></td>
                <td style="width:12%"><?php echo $nama_barang ?></td>
                <td style="width:9%"><?php echo $tahun_perolehan ?></td>
                <td style="width:10%"><?php echo $grup ?></td>
                <td style="width:12%"><?php echo $kategori ?></td>
                <td style="width:5%"><?php echo $kelas ?></td>
                <td style="width:5%"><?php echo $sub_kelas ?></td>
                <td style="width:8%"><?php echo $nomor_urut ?></td>
                <td style="width:8%"><?php echo $kode_aset ?></td>
                <td style="width:8%"><?php echo $qr_code ?></td>
                <td style="width:8%"><?php echo $kode_telkom ?></td>
                <td style="width:8%"><?php echo $serial_number ?></td>
                
            </tr>

            <?php 
            }
            ?>
            
           

            
        </tbody>
            
         
        </table>
            <br>
        <table>
        <tbody>
            <tr style="text-align: center;
        align-items: center">
            <td></td>
            <td > Yang Menerima,<br><br><br><br><br>.............................(5)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td > ............... , .............................. (4)<br>Yang Menyerahkan,<br><br><br><br>.................................................(6)</td>
            </tr>
        </tbody>
    
</table>
</body>
</html>

<style>
    h2{
        text-align: center;
        align-items: center;
        font-size: 18px;
    }
.content-table{

    margin: 10px 0;
    
    border-radius: 1px;
    
    align-items: center;
    text-align: center;
    
}

.content-table thead tr{
    border: 3px solid #000000;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    

}

.content-table th,
.content-table td{
    padding: 12px 15px;
    
}
.content-table tbody tr{
    border: 3px solid #000000;
    
}

.content-table tbody tr:last-of-type{
    border-bottom: 2px solid var(--primary-color);
}

.content-table tbody tr td a{
    

    padding: 1px;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
}
</style>
<?php
}else{
    header("Location: index.php");
    exit();
}
?>