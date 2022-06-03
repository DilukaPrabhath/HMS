@extends('backend.manager.layout.master') @section('content')
<style type="text/css">
/* Badge */

.badge1 {
	width: 40px;
	height: 20px;
	border-radius: 10px;
	top: 0;
}

.blue {
	background: dodgerblue;
	color: deepskyblue;
}


}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1> </div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<table width="100%">
				<tr>
					<td>
						<h5 class="m-0 font-weight-bold text-dark col-md-4">Filtered Reports - Room Vise</h5></td>
				</tr>
			</table>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
					<div class="container-fluid">
						<div class="d-sm-flex align-items-center justify-content-between mb-4"> </div>
						<div class="card-body">
							<div class="table-responsive">
								<div class="form-group col-md-18">
									<div class="container-fluid">
										<div class="d-sm-flex align-items-center justify-content-between ">
											<h6 class="m-0 font-weight-bold text-dark" style="padding-top:10px">Distribution by Room Type</h6>
											<br> </div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered" width="100%" cellspacing="0">
													<thead style="background-color:#F5F5F5;">
														<tr style="color:black;">
															<th>Room Type</th>
															<th>Customer Count</th>
														</tr>
													</thead>
													<tr>
														<td>Single</td>
														<td><span class="badge badge-danger">{{ \DB::table('customers')->where('room_type_id','=','1')->count()}}</span></td>
													</tr>
													<tr>
														<td>Double</td>
														<td><span class="badge badge-danger">{{ \DB::table('customers')->where('room_type_id','=','2')->count()}}</span></td>
													</tr>
													<tr>
														<td>Family</td>
														<td><span class="badge badge-danger">{{ \DB::table('customers')->where('room_type_id','=','3')->count()}}</span></td>
													</tr>
													<tr>
														<td>Suite</td>
														<td><span class="badge badge-danger">{{ \DB::table('customers')->where('room_type_id','=','4')->count()}}</span></td>
													</tr>
													<tr>
														<td>Double Extra</td>
														<td><span class="badge badge-danger">{{ \DB::table('customers')->where('room_type_id','=','5')->count()}}</span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="table-responsive">
						<div class="container">
							<table width="100%">
								<tr>
									<td>
										<h6 class="m-0 font-weight-bold text-dark">Filter by Room Type</h6></td>
									<td>
										<div class="col-md-12 float-right">
                  						<button type="button" name="export" id="export" class="btn btn-dark float-right">Export Data</button>
                  						<button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>
                						</div>
									</td>
								</tr>
							</table>
							<br>
							<div class="card shadow mb-4">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped" id="room_table">
											<thead>
												<tr>
													<th>Name</th>
													<th>Room No</th>
													<th>
														<select name="category_filter" id="category_filter" class="form-control">
															<option value="">Select Room Type</option> @foreach($room as $row)
															<option value="{{ $row->id }}">{{ $row->room_type}}</option> @endforeach </select>
													</th>
													<th>Created Date</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
							<br />
							<br /> </div>
					</div>
				</div>
			</div>
			<div class="form-row"> </div>
			<div class="form-row"> </div>
			<div class="form-group"> </div>
			</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	fetch_data();

	function fetch_data(room = '') {
		$('#room_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('column-searching.index') }}",
				data: {
					room: room
				}
			},
			columns: [
			{
				data: 'fname',
				name: 'fname'
			}, 
			{
				data: 'room_name',
				name: 'room_name'
			}, 
			{
				data: 'room_type',
				name: 'room_type',
				orderable: false
			}, 
			{
				data: 'created_at',
				name: 'created_at'
			}]
		});
	}
	$('#refresh').click(function() {
		$('#category_filter').val('');
		$('#room_table').DataTable().destroy();
		fetch_data();
	});
	$('#category_filter').change(function() {
		var id = $('#category_filter').val();
		$('#room_table').DataTable().destroy();
		fetch_data(id);
	});
});
</script> 
@stop