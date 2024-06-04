$(document).ready(function () {

   //mehilangkan tombol cari
   $('#tombol-cari').hide()


   // membuat event ketika keyword diketik
   $('#keyword').on('keyup', function () {
      // menampilkan icon loading
      $('.lod').show()


      // jalankan search ajax menggunakan load
      // $('#container').load('ajax/mhs.php?keyword=' + $(keyword).val());

      // menggunakan  $.get() dan fitur loading
      $.get('ajax/mhs.php?keyword=' + $(keyword).val(), function (data) {
         
         $('#container').html(data);
         $('.lod').hide();

      });

   });


})



// // panggil
// const keyword = document.getElementById('keyword');
// const tombolCari = document.getElementById('tombol-cari');
// const container = document.getElementById('container');


// // tambahkan event ketika keyword ditulis
// keyword.addEventListener('keyup', function () {
   
//    // buat objek ajax
//    const xhr = new XMLHttpRequest()
   
//    // cek kesiapan ajax
//    xhr.onreadystatechange = function () {
//       if (xhr.readyState == 4 && xhr.status == 200) {
//          container.innerHTML = xhr.responseText;
//       }
//    }

//    // eksekusi ajax 
//    xhr.open('get', 'ajax/mhs.php?keyword=' + keyword.value, true);
//    xhr.send();
   
// });