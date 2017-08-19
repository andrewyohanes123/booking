var app = angular.module('antriDash', ['ngRoute', 'ngCookies']);
// moment.locale('id');
var baseUrl = window.location.origin + '/bivi2';
app.controller('dashTitle', function($scope, $cookieStore){
  $scope.username = $cookieStore.get('username');
  $scope.nama_admin = $cookieStore.get('nama_admin');
});

app.controller('adminSetting', function($scope, $http, $cookieStore, $location){
  $scope.simpanPassword = function()
  {
    var data = {
      password_lama : $scope.password_lama,
      password_baru : $scope.password_baru,
      konfirmasi_password_baru : $scope.password_baru2
    }
    if ($scope.password_baru != $scope.password_baru2)
    {
      alert('Password tidak sama!');
    }
    else if ($scope.password_lama == null && $scope.password_baru == null && $scope.password_baru2 == null)
    {
      alert('Masukkan password!')
    }
    else
    {
      $http.post(baseUrl + '/bivi_backend/index.php/admin/update_password_admin', data).then(function(hasil){
        console.log(hasil.data);
      })
    }
  }
})

app.controller('sessionCheck', function($scope, $http, $cookieStore, $location){
  $scope.currentPath = $location.$$absUrl;

  $http.get(baseUrl + '/bivi_backend/index.php/index/check').then(function(hasil){
    if (hasil.data.session.status == 'not_login')
    {
      window.location.replace('login.html');
      $cookieStore.remove('nama_admin');
      $cookieStore.remove('username');
    }
    // console.log(hasil.data.session.status);
  });

  $('a#logoutBtn').click(function(e){
    e.preventDefault();
    $http.get(baseUrl + '/bivi_backend/index.php/admin/logout').then(function(hasil){
      console.log(hasil.data);
      $cookieStore.remove('nama_admin');
      $cookieStore.remove('username');
      window.location.replace('index.html');
    });
  })
});

app.config(function($routeProvider){
  $routeProvider
  .when('/', {
    templateUrl : "antrian.html"
  })
  .when('/antrian_selesai', {
    templateUrl : "antrian_selesai.html",
    controller : "antrian_selesai"
  })
  .when('/antrian_seluruh', {
    templateUrl : "antrian_pertanggal.html",
    controller : "antrianPerTanggal"
  })
  .when('/administrator', {
    templateUrl : "admin.html",
    controller : "administrator"
  })
  .when('/pengaturan', {
    templateUrl : "pengaturan.html",
    controller : "pengaturan"
  })
  .when('/tujuan_antrian', {
    templateUrl : "tujuan_antrian.html",
    controller : "tujuan"
  })
  .otherwise({
    redirectTo : "/"
  })
});

app.controller('pengaturan', function($scope, $http, $cookieStore){
  $scope.loadOption = function()
  {
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_option').then(function(hasil){
      console.log(hasil.data);
    })
  }

  $scope.loadOption();
});

app.controller('antrianPerTanggal', function($scope, $http, $cookieStore){
  // $scope.data = true;
  $(document).on('submit', '#form-tanggal', function(){
    $scope.data = true;
    var tanggal = $('#tanggalSekarang').val();
    var hasil = moment(tanggal).format('YYYY-MM-DD');
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_antri_by_tanggal/' + hasil).then(function(hasil){
      $scope.data_antrian = hasil.data;
      $scope.besar_data = hasil.data.length;
      $scope.data = true;
      $('#pilih_tanggal').hide();
      $scope.tanggal = moment(tanggal).format('DD MMM YYYY');
    });
  });

});

app.controller('administrator', function($scope, $http, $cookieStore){
  $scope.listAdmin = function()
  {
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_admin').then(function(hasil){
      $scope.hasilRow = hasil.data.length;
      $scope.dataAdmin = hasil.data;
      $scope.sess = $cookieStore.get('username')
    });
  }

  $scope.listAdmin();

  $scope.tambahAdmin = function()
  {
    var data = {
      username : $scope.username,
      nama_admin : $scope.nama_admin,
      password : $scope.password
    }

    $http.post(baseUrl + '/bivi_backend/index.php/admin/tambah_admin', data).then(function(hasil){
      console.log(hasil.data);
    });
  }

  $scope.editAdmin = function(id, username, nama_admin)
  {
    $scope.id = id;
    $scope.nama_admin = nama_admin;
    $('#simpan').fadeToggle();
    $('#tambah').fadeToggle();
    $('#uname').hide();
    $('#passwd').hide();
  }

  $scope.updateAdmin = function()
  {
     if ($scope.nama_admin == '' || $scope.nama_admin == null)
    {
      alert('Masukkan nama Anda!');
    }
    else
    {
      var data = {
        id_admin : $scope.id,
        nama_admin : $scope.nama_admin
      }

      $http.post(baseUrl + '/bivi_backend/index.php/admin/update_nama_admin', data).then(function(hasil){
        $scope.listAdmin()
      })
    }

    $scope.nama_admin = ''
    $('#simpan').fadeToggle();
    $('#tambah').fadeToggle();
    $('#uname').show();
    $('#passwd').show();
  }

  $scope.hapusAdmin = function(id)
  {
    $http.get(baseUrl + '/bivi_backend/index.php/admin/delete_admin/'+ id).then(function(hasil){
      $scope.listAdmin();
    })
  }

});

app.controller('antrian_selesai', function($scope, $http, $cookieStore){
  $http.get(baseUrl + "/bivi_backend/index.php/admin/ambil_antri_selesai").then(function(hasil){
    $scope.data_antrian = hasil.data;
    $scope.data_jlh = hasil.data.length;
  });
});

app.controller('tujuan', function($scope, $http){
  $scope.listTujuan = function()
  {
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_tujuan').then(function(hasil){
      $scope.hasilRow = hasil.data.length;
      $scope.dataAdmin = hasil.data;
    });
  }

  $scope.listTujuan();

  $scope.tambahTujuan = function()
  {
    if ($scope.tujuan == '' | $scope.tujuan == null)
    {
      $('#warning').slideToggle();
      setTimeout(function(){
        $('#warning').slideToggle();
      }, 2000);
    }
    else
    {
      var data = {
        tujuan : $scope.tujuan
      }
      $http.post(baseUrl + "/bivi_backend/index.php/admin/tambah_tujuan", data).then(function(hasil){
        if (hasil.data == '"Berhasil"')
        {
          $('#found').slideToggle();
          setTimeout(function(){
            $('#found').slideToggle();
            $scope.listTujuan();
            $scope.tujuan = '';
          },2000);
        }
        else
        {
          $('#not_found').slideToggle();
          setTimeout(function(){
            $('#not_found').slideToggle();
          },2000);
        }
      });
    }
  }

  $scope.hapusTujuan = function(id)
  {
    var data = {
      id_tujuan : id
    }
    $http.post(baseUrl + '/bivi_backend/index.php/admin/hapus_tujuan/', data).then(function(hasil){
      if (hasil.data == '"Berhasil"')
      {
        $scope.listTujuan();
      }
    });
  }

  $scope.editTujuan = function(id, tujuan)
  {

    $scope.tujuan = tujuan;
    $scope.id_tujuan = id;

    var data = {
      id_tujuan : $scope.id_tujuan,
      tujuan : $scope.tujuan
    }

    $('#tambahTujuan').hide();
    $('#editTujuan').show();
    $('#editBatal').show();
    $('#editBatal').on('click', function(){
      $('#tambahTujuan').show();
      $('#editTujuan').hide();
      $('#editBatal').hide();
    });
  }

  $scope.updateTujuan = function(id, tujuan)
  {
    var data = {
      id_tujuan : $scope.id_tujuan,
      tujuan : $scope.tujuan
    }

    $http.post(baseUrl + '/bivi_backend/index.php/admin/update_tujuan', data).then(function(hasil){
      if (hasil.data == '"Berhasil"')
      {
        $scope.listTujuan();
        $scope.tujuan = ''
        $('#tambahTujuan').show();
        $('#editTujuan').hide();
        $('#editBatal').hide();
      }
    })
  }
})

app.controller('antrianSekarang', function($scope, $http, $cookieStore){

  $scope.antriSelesai = function(id)
  {
    var data = {
      id_antri : id
    }

    $http.post(baseUrl + '/bivi_backend/index.php/admin/update_status_selesai', data).then(function(hasil){
      $scope.getDaftar();
    })
  }

  $scope.checkAntrian = function()
  {
    $http.get(baseUrl + "/bivi_backend/index.php/admin/waktu_sekarang").then(function(hasil){
      $scope.jam = hasil.data;
    });
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_antri_hari_ini').then(function(hasil){
      $scope.data_antri = hasil.data;
      angular.forEach(hasil.data, function(val, key){
        if (val.jam_hitung < $scope.jam && val.status_pengantri == 0)
        {
          var data = {
            id_antri : val.id_antri
          }
          $http.post(baseUrl + '/bivi_backend/index.php/admin/update_status_selesai', data).then(function(hasil){
            $scope.getDaftar();
          });
        }
      });
    });
  }

  $scope.checkAntrian();

  $scope.getDaftar = function()
  {
    $http.get(baseUrl + "/bivi_backend/index.php/admin/waktu_sekarang").then(function(hasil){
      $scope.waktu = hasil.data;
    });
    $http.get(baseUrl + '/bivi_backend/index.php/admin/ambil_antri_hari_ini').then(function(hasil){
      if (hasil.data.length == 0)
      {
        $scope.hasil = 'kosong';
        $scope.antrian = null;
      }
      else
      {
        $scope.antrian = hasil.data;
        if (hasil.data[0].jam_hitung - $scope.waktu <= 0) {
          console.log(hasil.data[0].jam_hitung - $scope.waktu);
        }
        setInterval(function(){
          if (hasil.data[0].jam_hitung - $scope.waktu <= 0)
          {
            $scope.antriSelesai(hasil.data[0].id_antri);
          }
        }, 1000);
      }
    });
  }

  $scope.btnSelesaiShow = function(id)
  {
    $('#'+id).removeAttr('disabled')
  }

  $scope.waktu_sekarang = function()
  {
    $http.get(baseUrl + "/bivi_backend/index.php/admin/waktu_sekarang").then(function(hasil){
      $scope.waktu = hasil.data;
    });
  }
  $scope.getDaftar();

  $scope.checkDaftar = function ()
  {
    angular.forEach($scope.antrian, function(val, key){
      console.log(val);
    });
  }

  // $scope.checkDaftar()

  $scope.ambil_option = function()
  {
    $http.get(baseUrl + "/bivi_backend/index.php/admin/ambil_option").then(function(hasil){
      $scope.option = hasil.data;
    });
  }

  $scope.ambil_option();

  $scope.waktu_sekarang();
});

$(document).on('submit', 'form', function(){
  return false;
});

$(document).on('click', '#toggle-menu-antrian',function(e){
  e.preventDefault();
  $('ul#menu-antrian').slideToggle();
  $('#right').toggleClass('fa-plus-square-o')
  return false;
});

$(document).on('click', '#toggle-menu-tujuan',function(e){
  e.preventDefault();
  $('ul#menu-tujuan').slideToggle();
  $('#right2').toggleClass('fa-plus-square-o')
  return false;
});
