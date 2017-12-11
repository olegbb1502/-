
// $(document).ready(function() { // вся магия после загрузки страницы
//   $('a#go').click( function(event){ // ловим клик по ссылки с id="go"
//     event.preventDefault(); // выключаем стандартную роль элемента
//     $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
//       function(){ // после выполнения предъидущей анимации
//         $('#modal_form') 
//           .css('display', 'block') // убираем у модального окна display: none;
//           .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
//     });
//   });
//   /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
//   $('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
//     $('#modal_form')
//       .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
//         function(){ // после анимации
//           $(this).css('display', 'none'); // делаем ему display: none;
//           $('#overlay').fadeOut(400); // скрываем подложку
//         }
//       );
//   });
// });

$(document).ready(function() { // вся магия после загрузки страницы
  $('a#goadd').click( function(event){ // ловим клик по ссылки с id="go"
    event.preventDefault(); // выключаем стандартную роль элемента
    $('#add_overlay').fadeIn(400, // сначала плавно показываем темную подложку
      function(){ // после выполнения предъидущей анимации
        $('#modal_add_form') 
          .css('display', 'block') // убираем у модального окна display: none;
          .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
    });
  });
  /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
  $('#modal_add_close, #add_overlay').click( function(){ // ловим клик по крестику или подложке
    $('#modal_add_form')
      .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
        function(){ // после анимации
          $(this).css('display', 'none'); // делаем ему display: none;
          $('#add_overlay').fadeOut(400); // скрываем подложку
        }
      );
  });
});

$(document).ready(function() { // вся магия после загрузки страницы
  $('a#godell').click( function(event){ // ловим клик по ссылки с id="go"
    event.preventDefault(); // выключаем стандартную роль элемента
    $('#dell_overlay').fadeIn(400, // сначала плавно показываем темную подложку
      function(){ // после выполнения предъидущей анимации
        $('#modal_dell_form') 
          .css('display', 'block') // убираем у модального окна display: none;
          .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
    });
  });
  /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
  $('#modal_dell_close, #dell_overlay').click( function(){ // ловим клик по крестику или подложке
    $('#modal_dell_form')
      .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
        function(){ // после анимации
          $(this).css('display', 'none'); // делаем ему display: none;
          $('#dell_overlay').fadeOut(400); // скрываем подложку
        }
      );
  });
});

function admin() {
   var name = $('#name').val();
    console.log(name);
    var phone = $('#phone').val();
    console.log(phone);
    if(name=='Administration' && phone=='adminPhone'){
      location.href = '../admin/index.html';
    }
    else{
      location.href = '../.include/welcome.php';
    }
 }