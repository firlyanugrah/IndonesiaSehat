<div class="container row">
	<div class="col s8">
		<table>
			<tbody>
				<tr>
					<td style="width:15%">Username</td>
					<td>:</td>
					<td><div class="input-field"><input placeholder="Placeholder" id="username" type="text" value="<?=$user->username?>" readonly></div></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><div class="input-field"><input placeholder="Placeholder" id="name" type="text" value="<?=$user->first_name." ".$user->last_name?>" readonly></div></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><div class="input-field"><input placeholder="Placeholder" id="address" type="text" value="<?=$user->address?>" readonly></div></td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><div class="input-field"><input placeholder="Placeholder" id="city" type="text" value="<?=$user->city?>" readonly></div></td>
				</tr>
				<tr>
					<td>Nomer Telepon</td>
					<td>:</td>
					<td><div class="input-field"><input placeholder="Placeholder" id="phone" type="text" value="<?=$user->phone?>" readonly></div></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col s10"></div>
		<div class="col s1">
			<a href="<?=base_url('editprofile')?>"><button class="btn waves-effect waves-light" type="button">Ubah</button></a>
		</div>
		<div class="col s1 right-align">
			<a href="<?=base_url();?>"><button class="btn waves-effect waves-light" type="button">Kembali</button></a>
		</div>
	</div>
</div>