<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyễn Văn Đạt</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="my-4">Danh sách xe</h1>

    <!-- Add Car Button -->
    <div class="mb-4">
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Thêm mới xe</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('cars.index') }}" method="GET" class="form-inline mb-4">
        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Tìm kiếm xe" value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Tìm kiếm</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($cars->isEmpty())
        <div class="alert alert-info">Không tìm thấy xe nào.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Miêu tả</th>
                    <th>Model</th>
                    <th>Ngày sản xuất</th>
                    <th>Hình ảnh</th>
                    <th>Loại xe</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->description }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->produced_on }}</td>
                        <td><img src="{{ asset('image/' . $car->image) }}" alt="Car Image" width="100"></td>
                        <td>{{ $car->mf->mf_name }}</td>
                        <td>
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
