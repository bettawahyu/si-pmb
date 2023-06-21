<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }
        .card-registration .select-arrow {
        top: 13px;
        }
    </style>
</head>
<body>

<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Formulir Pendaftaran Siswa</h3>
                <form class="form-horizontal" action="{{route('register.create')}}" method="POST" enctype="multipart/form-data">
                <fieldset>
                    @csrf
                    <input type="hidden" value="{{$nopen}}" name="nopen">
                    <input type="hidden" value="3" name="role_id">
                <div class="form-outline mb-4">
                      <input type="text" id="nama" class="form-control form-control-lg" name="nama" placeholder="Nama" value="{{old('nama')}}" required/>
                      <div class="invalid-feedback @if ($errors->has('nama')) d-block @endif">Wajib diisi.</div>
                      <label class="form-label" for="nama">Nama Calon Siswa*</label>
                </div>
                <div class="form-outline mb-4">
                  <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{old('alamat')}}</textarea>
                  <div class="invalid-feedback @if ($errors->has('alamat')) d-block @endif">Wajib diisi.</div>
                  <label class="form-label" for="alamat">Alamat Rumah</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="telepon" class="form-control form-control-lg" name="telepon" placeholder="Telepon" value="{{old('telepon')}}" required/>
                  <div class="invalid-feedback @if ($errors->has('telepon')) d-block @endif">Gunakan angka atau nomor dan wajib diisi.</div>
                  <label class="form-label" for="telepon">Telepon*</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="Email" value="{{old('email')}}" required/>
                    <div class="invalid-feedback @if ($errors->has('email')) d-block @endif">Email sudah terpakai. Gunakan yang lain dan wajib diisi.</div>
                  <label class="form-label" for="email">Email*</label>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                        <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi" required/>
                        <div class="invalid-feedback @if ($errors->has('password')) d-block @endif">Panjang minimal 8 karakter dan wajib diisi.</div>
                        <label class="form-label" for="password">Kata Sandi*</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                        <input type="password" id="confirm" class="form-control form-control-lg" name="confirm" placeholder="Ulangi Kata Sandi" required/>
                        <div class="invalid-feedback @if ($errors->has('confirm')) d-block @endif">Panjang minimal 8 karakter dan wajib diisi.</div>
                        <label class="form-label" for="confirm">Ulangi Kata Sandi</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="kelas">Pilih Kelas</label>
                  <div class="invalid-feedback @if ($errors->has('kelas')) d-block @endif">Wajib diisi.</div>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id='kelas' name='kelas'>
                        <option selected>Pilih Kelas</option>
                        @foreach($kelas_all as $id => $value)
                            <option value="{{ $id }}">{{ $value }}</option>
                        @endforeach
                    </select>
                  </div>
                 </div>
                </div>
                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                  <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>
                </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script id="rendered-js" >
    var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm");

    function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
