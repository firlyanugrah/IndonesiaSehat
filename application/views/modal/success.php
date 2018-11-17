<div id="modal_success" class="modal">
	<div class="modal-content center-align">
		<h5>Produk Berhasil Ditambahkan</h5>
		<div style="margin:50px 0">
			<a class="modal-close waves-effect waves-green btn-flat" onClick="redirectUrl()">OKE</a>
		</div>
	</div>
</div>

<script type="text/javascript">
function redirectUrl(){
	window.location = '<?=current_url()?>';
}
</script>