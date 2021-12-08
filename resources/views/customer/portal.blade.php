<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
</head>

<body>
    @include('alert')
    <h1 class="text-uppercase">{{ $company }}</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('customer.store', $company) }}" method="POST">
                    @csrf
                    <table class="table">
                        <tr>
                            <td>Ad</td>
                            <td>
                                <input type="text" name="name" placeholder="Ad" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Soyad</td>
                            <td>
                                <input type="text" name="surname" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Doğum Tarihi</td>
                            <td>
                                <input type="date" name="birthday" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefon</td>
                            <td>
                                <input type="text" name="phone" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="float: right;">
                                <button type="submit">Kaydet</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
