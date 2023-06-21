<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv = "refresh" content = "0; url = {{route('manage.pendaftar.index')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Peserta</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Abel');

        html, body {
        background: #ffffff;
        font-family: Abel, Arial, Verdana, sans-serif;
        }

        .center {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        }

        .card {
        width: 650px;
        height: 350px;
        background-color: #fff;
        background: linear-gradient(#f8f8f8, #fff);
        box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
        border-radius: 6px;
        overflow: hidden;
        position: relative;
        margin: 1.5rem;
        }

        .card h1 {
        text-align: center;
        }

        .card img{
            border: 6px solid #ffffff;
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }

        .card .additional {
        position: absolute;
        width: 200px;
        height: 100%;
        /* background: linear-gradient(#dE685E, #EE786E); */

        }

        .card.green .additional {
        background: linear-gradient(#92bCa6, #A2CCB6);
        }


        .card:hover .additional {
        width: 100%;
        border-radius: 0 5px 5px 0;
        }

        .card .additional .user-card {
        width: 200px;
        height: 100%;
        position: relative;
        float: left;
        }

        .card .additional .user-card::after {
        content: "";
        display: block;
        position: absolute;
        top: 10%;
        right: -2px;
        height: 80%;
        border-left: 2px solid rgba(0,0,0,0.025);*/
        }

        .card .additional .user-card .level,
        .card .additional .user-card .points {
        top: 15%;
        color: #fff;
        text-transform: uppercase;
        font-size: 1em;
        font-weight: bold;
        background: rgba(0,0,0,0.15);
        padding: 0.125rem 0.75rem;
        border-radius: 100px;
        white-space: nowrap;
        }

        .card .additional .user-card .points {
        top: 85%;
        }

        .card .additional .user-card svg {
        top: 50%;
        }

        .card .additional .more-info {
        width: 300px;
        float: left;
        position: absolute;
        left: 250px;
        height: 100%;
        }

        .card .additional .more-info h1 {
        color: #fff;
        margin-bottom: 0;
        }

        .card.green .additional .more-info h1 {
        color: #224C36;
        }

        .card .additional .coords {
        margin: 0 1rem;
        color: #fff;
        font-size: 1.1rem;
        }

        .card.green .additional .coords {
        color: #325C46;
        }

        .card .additional .coords span + span {
        float: right;
        }

        .card .additional .stats {
        font-size: 2rem;
        display: flex;
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        top: auto;
        color: #fff;
        }

        .card.green .additional .stats {
        color: #325C46;
        }

        .card .additional .stats > div {
        flex: 1;
        text-align: center;
        }

        .card .additional .stats i {
        display: block;
        }

        .card .additional .stats div.title {
        font-size: 0.75rem;
        font-weight: bold;
        text-transform: uppercase;
        }

        .card .additional .stats div.value {
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1.5rem;
        }

        .card .additional .stats div.value.infinity {
        font-size: 2.5rem;
        }

</style>
</head>
<body onload="window.print()">
<div class="center">

  <div class="card green">
    <div class="additional">
      <div class="user-card">
        <div class="level center">
          {{$sekolah->nama_sekolah}}
        </div>
        <div class="points center">
          {{$kartu->no_pendaftaran}}
        </div>
        <div class="center">
         <img src="{{asset('upload/pendaftar/'.$kartu->foto_pendaftar)}}" alt="foto pendaftar">
        </div>
      </div>
      <div class="more-info">
        <h1>Bukti Pendaftaran</h1>
        <p></p>
        <div class="coords">
          <span>Nama Pendaftar:</span>
          <span><b>{{$kartu->nama_siswa}}</b></span>
        </div>
        <div class="coords">
          <span>Jenis Kelamin:</span>
          <span><b>{{$kartu->jenis_kelamin_id->jenis_kelamin??""}}</b></span>
        </div>
        <div class="coords">
          <span>Alamat:</span>
        </div>
        <div class="coords">
          <span><b>{{$kartu->alamat}}, {{$kartu->kel_desa}}, {{$kartu->kecamatan}}</b></span>
        </div>
        <div class="stats">
          <div>
            <div class="title">Usia</div>
            <i class="fa fa-trophy"></i>
            <div class="value">
                @php
                $date = $kartu->tanggal_lahir;
                $year = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y');
                $usia = date('Y')-$year;
                echo $usia;
                @endphp
            </div>
          </div>
          <div>
            <div class="title">Jurusan</div>
            <i class="fa fa-gamepad"></i>
            <div class="value">{{$kartu->kelas_id->nama_kelas??""}}</div>
          </div>
          {{-- <div>
            <div class="title">Pals</div>
            <i class="fa fa-group"></i>
            <div class="value">123</div>
          </div>
          <div>
            <div class="title">Coffee</div>
            <i class="fa fa-coffee"></i>
            <div class="value infinity">∞</div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

</div>
</body>
</html>
