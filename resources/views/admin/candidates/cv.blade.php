<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title></title>
	<link rel="stylesheet" href="">
<style>
body {
	font-family: DejaVu Sans;
	line-height: 1.7em;
}
h2
	{
		text-align: center;
	}
</style>

</head>
<body>
	<div class="container">
		
		<h2>Giấy Báo Nhập Học</h2>
		<table class="table table-bordered" >
			<tr>
				<td><b>Họ và tên:</b> {{ $candidate->getFullName() }}</td>
			</tr>
			<tr>
				<td><b>Sinh Ngày: </b>{{ $candidate->date_of_birth }}</td>
				<td><b>Địa chỉ thường trú: </b>{{ $candidate->address }}</td>
			</tr>
			<tr>
				<td><b>Số CMND: </b>{{ $candidate->numbers_cmnd }}</td>
			</tr>
			<tr>
				<td><b>Đối tượng: </b>{{ $candidate->candidateType->name }}</td>
				<td><b>Khu vực ưu tiên: </b>{{ $candidate->area->name }}</td>
				
			</tr>
			<tr>
				<td><b>Ngành xét tuyển: </b>{{ $candidate->branch->name }}</td>
				<td><b>Khối thi: </b>{{ $candidate->set->name }}</td>
				<td><b>Chuyên Ngành: </b>{{ $candidate->specialized->name }}</td>
			</tr>
			<tr>
				@foreach ($candidate->subjects as $subject)
                    <td><b>{{ $subject->name }} : </b>{{ $subject->pivot->point }}</td>
                @endforeach
			</tr>
			<tr>
				<td><b>Tổng điểm: </b>{{ $total }}</td>
			</tr>
	    </table>
	</div>
</body>
</html>