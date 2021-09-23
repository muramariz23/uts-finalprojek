<?php 

  //memanggil fungsi dari CSRF
include('../config/csrf.php');

include '../controller/controller_siswa.php';

//membuat objek dari class siswa
$siswa = new controller_siswa();
$nisn = base64_decode($_GET['nisn']);
$GetSiswa = $siswa->GetData_Where($nisn);

 ?>




 <?php 

  foreach ($GetSiswa as $Get) {

  ?>

  <form action="../config/routes.php?function=put_siswa" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>">
    <table class="table table-warning">
      <input type="hidden" name="nisn" value="<?php echo $Get['nisn']; ?>">
      <tr>
        <th scope="row">NIS</th>
        <td><input class="form-control" type="text" name="nis" value="<?php echo $Get['nis'] ?>"></td>
      </tr>

      <tr>
        <th scope="row">NAMA</th>
        <td><input class="form-control" type="text" name="nama" value="<?php echo $Get['nama'] ?>"></td>
      </tr>

      <tr>
        <th scope="row">KELAS</td>
        <td>
          
        <select class="dropdown-list" name="id_kelas">
                <?php 
                $GetKelas = $siswa->GetData_Kelas();
                foreach ($GetKelas as $GetK) : ?>
                <option value="<?php echo $GetK['id_kelas'] ?>"><?php echo $GetK['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>


        </td>
      </tr>

      <tr>
        <th scope="row">ALAMAT</th>
        <td><input class="form-control" type="text" name="alamat" value="<?php echo $Get['alamat'] ?>"></td>
      </tr>

      <tr>
        <th scope="row">NO TELEPON</th>
        <td><input class="form-control" type="text" name="no_telp" value="<?php echo $Get['no_telp'] ?>"></td>
      </tr>

      <tr>
        <th scope="row">SPP</th>
        <td>
        <select class="form-control" name="id_spp">

          <!-- Logic combo Get database -->
          <option value="<?php echo $Get['id_spp']; ?>">
          <?php
            if($Get['id_spp']=="1"){
              echo "30000";
            } else if ($Get['id_spp']=="2") {
              echo "25000";
            } elseif ($Get['id_spp']=="3") {
              echo "20000";
            } else {
              echo "15000";
            }
          ?>
          </option>
          <!-- Logic combo Get database -->

          <option value="1">30000</option>
          <option value="2">25000</option>
          <option value="3">20000</option>
          <option value="4">15000</option>
          </select>
        </td>
      </tr>

      <tr>

        <td><a href="main.php?menu=<?php echo base64_encode(2) ?>"><button type="button" class="btn btn-danger">KEMBALI</button></a></td> 
        <td colspan="2" align="right"><input type="submit" name="proses" value="create"></td>
      </tr>
    </table>
  </form>

  <?php } ?>