var app = angular.module('antriApp', ['ngRoute', 'ngCookies']);
var baseUrl = window.location.origin + '/bivi2';

app.controller('titleController', function($scope){
  $scope.title = "Ambil antrian"
})

$(document).on('blur', '#nama_pengantri', function(){
  if ($(this).val() == '' || $(this).val() == null)
  {
    $('#notif').slideDown();
    $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Masukkan nama pengantri');
    setTimeout(function(){
      $('#notif').slideUp();
      $('#notif').empty();
    }, 1500)
  }
});

$(document).on('blur', '#tujuan', function(){
  if ($(this).val() == '')
  {
    $('#notif').slideToggle();
    $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Pilih tanggal besok');
    setTimeout(function(){
      $('#notif').slideToggle();
      $('#notif').empty();
    },2000);
  }
});

$(document).on('click', '.hijau', function(){
  $(this).toggleClass('active-hijau');
})

app.controller('app', function($scope, $http, $cookieStore, $location){
  $scope.currentPath = $location.path();
  $(document).on('change', '#pick_tanggal', function(){
    var waktu = moment($scope.tanggal).format('YYYY-MM-DD');
    var hariIni = moment().format('YYYYMMDD');
    var tanggal = moment($scope.tanggal).format('YYYYMMDD');
    var hari = moment($scope.tanggal).format('dddd');
    if (tanggal - hariIni <= 0)
    {
      $('#notif').slideToggle();
      $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Pilih tanggal besok');
      setTimeout(function(){
        $('#notif').slideToggle();
        $('#notif').empty();
      },2000);
    }
    else if (hari == 'Saturday' || hari == 'Sunday')
    {
      $('#notif').slideToggle();
      $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Pilih hari Senin - Jumat');
      setTimeout(function(){
        $('#notif').slideToggle();
        $('#notif').empty();
      },2000);
    }
    else
    {
      $http.post( baseUrl + '/bivi_backend/index.php/index/ambil_jam_by_tanggal/'+ waktu).then(function(hasil){
        $scope.jam_antri = hasil.data;
        $('#jam_antri').fadeToggle()
        if ($('#jam_antri').css('display') == 'block')
        {
          $('#jam_antri').slideDown()
        }
        else
        {
          $('#jam_antri').slideUp()
        }
      });
    }
  });

  $http.get( baseUrl + '/bivi_backend/index.php/index/ambil_tujuan').then(function(hasil){
    $scope.data_tujuan = hasil.data;
  });

  $scope.click_hijau = function(jam, events)
  {
    $scope.waktu = jam;
  }



  $scope.tambah_antri = function()
  {
    if ($scope.ket_user != null || $scope.ket_user == '')
    {
      var data = {
        nama : $scope.nama,
        id_tujuan : $scope.tujuan,
        tanggal : moment($scope.tanggal).format('YYYY-MM-DD'),
        jam : $scope.waktu,
        ket_user : $scope.ket_user
      }
    }
    else
    {
      var data = {
        nama : $scope.nama,
        id_tujuan : $scope.tujuan,
        tanggal : moment($scope.tanggal).format('YYYY-MM-DD'),
        jam : $scope.waktu,
        ket_user : ''
      }
    }

    window.location.replace('#!/no_antrian');
    $('#form-pendaftaran').slideToggle();
    moment.locale('id');

    if ($scope.nama == "")
    {
      $('#notif').slideToggle();
      $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Masukkan nama Anda');
      setTimeout(function(){
        $('#notif').slideToggle();
        $('#notif').empty();
      },2000);
    }
    else if ($scope.tujuan == '')
    {
      $('#notif').slideToggle();
      $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Pilih tujuan mengantri');
      setTimeout(function(){
        $('#notif').slideToggle();
        $('#notif').empty();
      },2000);
    }
    else if ($scope.waktu == null || $scope.waktu == '')
    {
      $('#notif').slideToggle();
      $('#notif').append('<span class="fa fa-exclamation-circle fa-lg"></span>&nbsp;Pilih jam antri');
      setTimeout(function(){
        $('#notif').slideToggle();
        $('#notif').empty();
      },2000);
    }
    else
    {
      $http.post(baseUrl + "/bivi_backend/index.php/index/tambah_antri", data).then(function(hasil){
        $scope.unique_id = hasil.data.unique_id;
      });
    }

  }

  $scope.cek_data = function()
  {
    if ($scope.currentPath == '/no_antrian')
    {
      if ($scope.unique_id == null || $scope.unique_id == '')
      {
        window.location.replace('index.html');
      }
    }
  }

  $scope.cek_data();

  $scope.cek_tiket = function()
  {
    window.location.replace('cek_antrian.html');
  }
});

app.controller('cek_antri', function($scope, $http, $cookieStore){
  $scope.cek_antrian = function()
  {
    // var data = {
    //   'unique_id':$scope.unique_id
    // }

    if ($('#data_antrian').css('display') != 'none')
    {
      $('#data_antrian').slideToggle();
    }
    else if ($scope.unique_id == '' || $scope.unique_id == null)
    {
      $('#warning').slideDown();
      setTimeout(function(){
        $('#warning').slideUp();
      }, 1500);
    }
    else
    {
      $http.post(baseUrl + '/bivi_backend/index.php/index/ambil_antri_by_unique_id/' + $scope.unique_id).then(function(hasil){
        console.log(hasil.data)
        if (hasil.data == 'null')
        {
          $('#not_found').slideDown();
          setTimeout(function(){
            $('#not_found').slideUp();
          },1500);
        }
        else
        {
          moment.locale('id');
          $('#found').slideDown();
          setTimeout(function(){
            $('#found').slideUp();
            $('#data_antrian').slideDown('slow');
          },1500);
          $scope.data_antri = hasil.data;
          $scope.tanggal = moment(hasil.data.tanggal).format('DD MMM YYYY');
        }
        // console.log(hasil.data);
      });
    }

  }
});

app.config(function($routeProvider){
  $routeProvider
  .when('/no_antrian', {
    templateUrl : "hasil_antrian.html",
    controller : "app"
  });
})

app.controller('dashTitle', function($scope, $cookieStore){
  $scope.username = $cookieStore.get('username');
});

app.controller('sessionCheck', function($scope, $http, $cookieStore){
  $http.get(baseUrl + '/bivi_backend/index.php/admin/session_check').then(function(hasil){
    if (hasil.data.session.status == 'not_login')
    {
      window.location.replace('login.html');
      $cookieStore.remove('nama_admin');
      $cookieStore.remove('username');
      $cookieStore.remove('id_user');
    }
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


app.controller('antrianSekarang', function($scope, $http, $cookieStore){
  $http.get(baseUrl + '/bivi_backend/index.php/admin/get_antrian_sekarang').then(function(hasil){
    if (hasil.data.length == 0)
    {
      $scope.hasil = 'kosong';
      $scope.antrian = null;
    }
    else
    {
      $scope.antrian = hasil.data;
    }
  })
})

app.controller('loginController', function($scope, $http, $cookieStore){

  $scope.sessCheck = function ()
  {
    $http.get(baseUrl + "/bivi_backend/index.php/index/check").then(function(hasil){
      if (hasil.data.session.status == "login")
      {
        window.location.replace('dashboard.html');
      }
    })
  }

  $scope.sessCheck();
  $(document).on('submit', '#form-login', function(){
    var data = {
      username : $scope.username,
      password : $scope.password
    }
    $http.post(baseUrl + '/bivi_backend/index.php/index/login', data).then(function(hasil){
      if (hasil.data.msg == 'Sukses')
      {
        $cookieStore.put('username', hasil.data.username);
        $cookieStore.put('id', hasil.data.id_admin);
        $cookieStore.put('nama_admin', hasil.data.nama_admin);
        $('#found').slideDown();
        setTimeout(function(){
          $('#found').slideUp();
          window.location.replace('dashboard.html');
        },1500);
      }
      else
      {
        $('#not_found').slideDown();
        setTimeout(function(){
          $('#not_found').slideUp();
        },1500);
      }
    })
    return false;
  })
});

$(document).on('submit', 'form', function(){
  return false;
})

$(document).on('submit', '#ambil_antri', function(){
  return false;
})
