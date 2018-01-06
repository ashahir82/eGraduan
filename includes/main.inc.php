<div class="section content">
	<div class="container">
		<div id="error">
		</div>
		<div class="panel panel-success panel-search">
			<div class="panel-heading text-center">
				<h2 class="panel-title">SEMAKAN GRADUAN</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal form-search">
					<div class="form-group">
						<label for="ndp" class="col-sm-4 control-label">Daftar Pelajar</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="ndp" placeholder="Nombor Daftar Pelajar">
						</div>
						<span id="helpBlock" class="col-sm-1 help-block">atau<span>
					</div>
					<div class="form-group">
						<label for="nokp" class="col-sm-4 control-label">Kad Pengenalan</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="nokp" placeholder="Nombor Kad Pengenalan">
						</div>
						<span id="helpBlock" class="col-sm-1 help-block">atau<span>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Nama</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="name" placeholder="Nama Pelajar">
						</div>
						<span id="helpBlock" class="col-sm-1 help-block"><span>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-success" id="searchCert">Semak</button>
							<button type="submit" class="btn btn-warning">Batal</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
				<p class="text-justify">Maklumat ini tepat untuk pelajar keluaran dari sesi <strong>2/2010</strong> dan seterusnya. Untuk maklumat lanjut sila hubungi <strong>Bahagian Kawalan Kualiti Latihan ILPKL</strong>.</p>
			</div>
		</div>
		
		<div class="panel panel-primary panel-result" style="display: none">
			<div class="panel-heading text-center">
				<h2 class="panel-title">KEPUTUSAN SEMAKAN</h2>
			</div>
			<div class="panel-body">
				<p id="search-result">...</p>
			</div>

			<!-- Table -->
			<div class="table-responsive">
				<table class="table table-hover table-condensed" id="displayresult">
					<thead>
						<tr class="info">
							<th>#</th>
							<th>Nama</th>
							<th>Persijilan</th>
							<th>Program</th>
							<th>Konvokesyen</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody id="searchContent">
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="graduanDetail">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title text-center">Maklumat Graduan</h3>
					</div>
					<div class="modal-body">
						<div id="dynamic-content"></div>
					</div>
					<div class="modal-footer bg-primary">
						<button type="button" class="btn btn-success" id="printDetail"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal" id="cancelButton"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Tutup</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>