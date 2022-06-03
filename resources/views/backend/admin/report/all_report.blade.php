@extends('backend.admin.layout.master') 
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"></h1> </div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<table width="100%">
				<tr>
					<td>
						<h5 class="m-0 font-weight-bold text-dark col-md-4">All Reports</h5></td>
					</td>
				</tr>
			</table>
		</div>
		<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
		.course {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
			display: flex;
			max-width: 100%;
			margin: 20px;
			overflow: hidden;
			width: 600px;
			margin-top: -10px;
			position: relative;
		}
		
		.course h6 {
			opacity: 0.6;
			margin: 0;
			letter-spacing: 1px;
			text-transform: uppercase;
		}
		
		.course h5 {
			letter-spacing: 1px;
			text-align: center;
			margin: 10px 0;
		}
		
		.course-preview {
			background-image: linear-gradient(to right, #057793, #758af4);
			color: #fff;
			padding: 30px;
			width: 300px;
		}
		
		.course-preview a {
			color: #fff;
			display: inline-block;
			font-size: 12px;
			opacity: 0.6;
			margin-top: 30px;
			text-decoration: none;
		}
		
		.course-info {
			padding: 30px;
			width: 100%;
		}
		
		.btn {
			background-color: #000000;
			border: 0;
			border-radius: 50px;
			box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
			color: #fff;
			font-size: 10px;
			padding: 12px 25px;
			position: absolute;
			bottom: 30px;
			right: 115px;
			letter-spacing: 1px;
		}
		</style>
		<table>
			<tr>
				<div class="card-body">
					<div class="table-responsive">
						<td>
							<div class="col-xl-10 col-md-6 mb-4">
								<div class="courses-container">
									<div class="course">
										<div class="course-preview">
											<h4>Customers</h4> </div>
											<a href="{{url('admin/customer_report')}}" class="nounderline">
										<div class="course-info">
											<h5>Collect Your Report</h5>
											<a href="#" class="hidden"></a>
										</div>
										</a>
									</div>
								</div>
							</div>
						</td>
						<td>
							<div class="col-xl-10 col-md-6 mb-4">
								<div class="courses-container">
									<div class="course">
										<div class="course-preview">
											<h4>Users</h4> </div>
											<a href="{{url('admin/user_report')}}" class="nounderline">
										<div class="course-info">
											<h5>Collect Your Report</h5>
											<a href="{{url('#')}}" class="hidden"></a>
										</div>
										</a>
									</div>
								</div>
							</div>
						</td>
			      </tr>
			<td>
				<div class="col-xl-10 col-md-6 mb-10">
					<div class="courses-container">
						<div class="course">
							<div class="course-preview">
								<h4>Rooms</h4> </div>
								<a href="{{url('admin/room_report')}}" class="nounderline">
							<div class="course-info">
								<h5>Collect Your Report</h5>
								<a href="{{url('#')}}" class="hidden"></a>
							</div>
							</a>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="col-xl-10 col-md-6 mb-10">
					<div class="courses-container">
						<div class="course">
							<div class="course-preview">
								<h4>Orders</h4> </div>
								<a href="{{url('daterange')}}" class="nounderline">
							<div class="course-info">
								<h5>Collect Your Report</h5>
								<a href="{{url('#')}}" class="hidden"></a>
							</div>
							</a>
						</div>
					</div>
				</div>
			</td>
			</tr>
		</table>
		</div>
		</div>
	</div>
</div>
</div> 
@stop