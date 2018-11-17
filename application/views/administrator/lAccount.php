<div class="container row">
	<form method="get" id="sorting_username">
	<div class="input-field col s2">
		<select>
		  <option value="" disabled selected>Pilih Tipe Sorting</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Sorting Username</label>
	</div>
	<div class="input-field col s2">
		<select>
		  <option value="" disabled selected>Pilih Tipe Sorting</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Sorting Nama</label>
	</div>
	<div class="input-field col s2">
		<select>
		  <option value="" disabled selected>Pilih Kota</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Filter Kota</label>
	</div>
	</form>
		<table>
        <thead>
          <tr>
              <th class="center-align">Username</th>
              <th class="center-align">Password</th>
              <th class="center-align">Nama</th>
              <th class="center-align">No Telpon</th>
              <th class="center-align">Alamat</th>
              <th class="center-align">Kota</th>
              <th class="center-align">Kode Pos</th>
              <th class="center-align">Aksi</th>
          </tr>
        </thead>

        <tbody>
		<?php
		foreach($users as $user){
			if($user->status != 0){
		?>
          <tr>
            <td class="center-align"><?=$user->username?></td>
            <td class="center-align"><?=$user->password?></td>
            <td class="center-align"><?=$user->first_name." ".$user->last_name?></td>
            <td class="center-align"><?=$user->phone?></td>
            <td class="center-align"><?=$user->address?></td>
            <td class="center-align"><?=$user->city?></td>
            <td class="center-align"><?=$user->postal_code?></td>
            <td class="center-align">
				<form id="<?=$user->username?>" action="<?=base_url('delAccount')?>">
					<input type="hidden" name="username" value="<?=$user->username?>">
					<button class="waves-effect waves-light btn" type="submit" formaction="<?=base_url('updAccount')?>"><i class="material-icons left">settings</i>Ubah</button>
					<button class="waves-effect waves-light btn" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini?')" id="del_<?=$user->username?>"><i class="material-icons right">delete</i>Hapus</button>
				</form>
			</td>
          </tr>
		 <?php }
		 } ?>
        </tbody>
      </table>
	</div>
	
<?php /*?><script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($users as $user){ ?>
	$("<?=$user->username?>").on("click", "#del_<?=$user->username?>", function(){
		$("#modal_konfirmasi").on("click", "#ya", function() {
			$("#<?=$user->username?>").submit();
		});
	});
	<?php } ?>
});
</script><?php */?>