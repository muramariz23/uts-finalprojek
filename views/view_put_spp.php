<?php 

	//memanggil fungsi dari CSRF
include('../config/csrf.php');

include '../controller/controller_spp.php';

//membuat objek dari class spp
$spp = new controller_spp();
$id_spp = base64_decode($_GET['id_spp']);
$GetSpp = $spp->GetData_Where($id_spp);

 ?>




 <?php 

 	foreach ($GetSpp as $Get) {

  ?>

  <form action="../config/routes.php?function=put_spp" method="POST">
  	<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>">
  	<table class="table table-warning">
  		<input type="hidden" name="id_spp" value="<?php echo $Get['id_spp']; ?>">
  		<tr>
  			<th scope="row">TAHUN</th>
  			<td><input class="form-control" type="text" name="tahun" value="<?php echo $Get['tahun'] ?>"></td>
  		</tr>

  		<tr>
  			<th scope="row">NOMINAL</th>
  			<td><input class="form-control" type="text" name="nominal" value="<?php echo $Get['nominal'] ?>"></td>
  		</tr>


  		<tr>
      <td><a href="main.php?menu=<?php echo base64_encode(4) ?>"><button type="button" class="btn btn-danger">KEMBALI</button></a></td> 
      

        <td colspan="2" align="right"><input type="submit" name="proses" value="create"></td>
      </tr>
  	</table>
  </form>

  <?php } ?>