<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/css.css">
</head>

<body>
    <br>
    <div class="container container-small">
        <form id="form">
            <div class="form-group row clone" id="clone">
                <div class="col">
                    <select class="form-control form-control-sm" name="field[]">
                        <option disabled selected hidden>Field...</option>
                        <option value="size">size</option>
                        <option value="forks">forks</option>
                        <option value="stars">stars</option>
                        <option value="followers">followers</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control form-control-sm" name="operator[]">
                        <option disabled selected hidden>Operator...</option>
                        <option value="<">&lt;</option>
                        <option value=">">&gt;</option>
                        <option value="">=</option>
                    </select>
                </div>
                <div class="col">
                    <input type="number" min="0" class="form-control form-control-sm" name="value[]"
                        placeholder="Value">
                </div>
                <div class="col">
                    <button type="button"
                        class="form-control form-control-sm btn btn-sm btn-danger delete">Delete</button>
                </div>

            </div>
        </form>
        <hr>
        <div class="form-group row" id="clone">
            <div class="col-2">
                <button type="button" class="form-control form-control-sm btn btn-sm btn-info" id="apply">Apply</button>
            </div>
            <div class="col-2">
                <button type="button" class="form-control form-control-sm btn btn-sm btn-warning"
                    id="clear">Clear</button>
            </div>
            <div class="col-6"></div>
            <div class="col-2 pull-right">
                <button type="button" class="form-control form-control-sm btn btn-sm btn-success" id="add">Add
                    Rule</button>
            </div>
        </div>


    </div>
    <hr>
    <div class="container">

        <div id="result">
        </div>
    </div>
    <div class="spinner"></div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/js.js"></script>


</html>