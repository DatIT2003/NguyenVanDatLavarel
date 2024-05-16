<!doctype html>
<html lang="en">
<head>
    <title>Thông tin xe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <style>
        /* Style cho ảnh xe */
        .car-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <img src="/image/{{ $car->image }}" class="car-image" alt="Ảnh xe"> 
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Thông tin xe</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="make" value="{{ $car->description }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" id="model" value="{{ $car->model }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="produced_on">Produced On:</label>
                            <input type="text" class="form-control" id="produced_on" value="{{ $car->produced_on }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="produced_on">Loại Xe:</label>
                            <input type="text" class="form-control" id="mf_name" value="{{ $car->mf->mf_name }}" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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