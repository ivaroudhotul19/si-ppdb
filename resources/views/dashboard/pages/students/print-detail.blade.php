<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Laporan Data Siswa {{ $student->name }}</title>
    <style>
      h2{
        text-align: center;
        text-transform: uppercase;
      }
      h3{
        text-align: left;
        margin-left: 35px
      }
      table{
        border-collapse: collapse;
        width: 90%;
        margin-left:auto;
        margin-right:auto;
      }
      p{
        text-align: left;
        margin-top: -10px;
        margin-bottom: 20px
      }
      .name{
        margin-top: -10px;
      }
      .nomor {
        text-align: center
      }
      table, th, td {
        border: 1px solid #222f3e;
        margin-bottom: 15px;
        margin-top: 15px;
        font-size: 14px;
      }
      th, td {
        display: table-cell;
        padding: 5px 5px 5px 5px;
      } 
      th {
        background-color: #222f3e;
        color: white;
        width: 35%;
        text-align: left;
      }
      .footer{
        text-align: left;
        margin-left: 35px;
        margin-top: 20px;
      }
    </style>
</head>
<body>
    <div class="row" id="table-bordered">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Penerimaan Peserta Didik Baru</h2>
              <h2 class="card-title name">sma angkasa</h2>
              <hr width="90%" align="center">
              <h3>Laporan Data Siswa {{ $student->name }}</h3>
              <p style="margin-left: 35px">Date : {{ date('d M Y') }}</p>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table class='table table-striped'>
                    <tr>
                        <th>Nomor Pendaftaran</th>
                        <td>{{ $student->no_pendf }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td><img src={{ asset('storage/'.$student->image) }} alt="foto" class="img-fluid"
                            width="300px">
                        </td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $student->major->jurusan }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $student->tmpt_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $student->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kadaluarsa</th>
                        <td>{{ $student->jns_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{ $student->asal_sklh }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $student->agama }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pembuatan</th>
                        <td>{{ $student->almt }}</td>
                    </tr>
                    <tr>
                        <th>Nama Orang Tua</th>
                        <td>{{ $student->nama_ortu }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan Orang Tua</th>
                        <td>{{ $student->pkerjaan_ortu }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $student->asal_sklh }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Ujian Nasional</th>
                        <td>{{ $student->nilai_un }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Ujian Sekolah</th>
                        <td>{{ $student->nilai_usek }}</td>
                    </tr>
                    <tr>
                        <th>Prestasi</th>
                        <td>{{ $student->prestasi }}</td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="footer">Copyright : {{ date('Y') }} &copy; Iva Roudhotul Rohmah</p>
</body>
</html>