
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Quản lí phòng thực hành tin học </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Liên kết Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
/* Giao diện chính */
body {
    color: #333;
    background: #f8f9fa;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    line-height: 1.6;
}

.container {
    margin-top: 30px;
}

h1 {
    font-size: 28px;
    font-weight: 600;
    color: #435d7d;
    margin-bottom: 20px;
    text-align: center;
}

/* Nút bấm */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    border-radius: 5px;
    text-transform: uppercase;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn {
    padding: 8px 12px;
    font-size: 13px;
    border-radius: 3px;
    text-transform: capitalize;
}

.btn-info {
    background-color: #17a2b8;
    border: none;
}

.btn-info:hover {
    background-color: #117a8b;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: #fff;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #bd2130;
}

/* Bảng */
.table {
    width: 100%;
    margin: 20px 0;
    background-color: #fff;
    border-collapse: collapse;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    text-align: left;
    padding: 15px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}

.table th {
    background-color: #435d7d;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
}

.table tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #e9ecef;
    transition: background-color 0.2s ease-in-out;
}

/* Phân trang */
.pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    list-style: none;
}

.pagination .page-item .page-link {
    color: #435d7d;
    border: 1px solid #ddd;
    margin: 0 5px;
    padding: 8px 12px;
    border-radius: 4px;
}

.pagination .page-item.active .page-link {
    background-color: #03A9F4;
    border-color: #03A9F4;
    color: white;
}

.pagination .page-item.disabled .page-link {
    color: #ccc;
    pointer-events: none;
    cursor: default;
}


/* Form */
form {
    display: inline;
}

form button {
    margin-left: 5px;
    border: none;
    border-radius: 3px;
    padding: 8px 12px;
    background-color: #dc3545;
    color: #fff;
    cursor: pointer;
}

form button:hover {
    background-color: #c82333;
}

</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>


</head>
<body>
<div class="container">
    <h1>Issue List</h1>
    <a href="{{ route('issues.index') }}" class="btn btn-primary">Add New Issue</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Computer Name</th>
                <th>Model</th>
                <th>Reported By</th>
                <th>Reported Date</th>
                <th>Urgency</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->computer->computer_name }}</td>
                <td>{{ $issue->computer->model }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->reported_date }}</td>
                <td>{{ $issue->urgency }}</td>
                <td>{{ $issue->status }}</td>
                <td>
                    <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('issues.edit', $issue) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('issues.destroy', $issue) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $issues->links() }}
    </div>

</div>
</body>
</html>
