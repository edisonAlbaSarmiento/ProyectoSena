//inicializacion Materialize Select
$(document).ready(function() {
    $('select').material_select();
//inicializacion tooltips
    $('.tooltipped').tooltip({delay: 50});
//inicializacion acordion
    $('.collapsible').collapsible({
      accordion : false // Un entorno que cambia el comportamiento collapsible para ampliable en lugar de la forma de acordeón por defecto
   });

    $(".button-collapse").sideNav({

      menuWidth: 300, // El valor predeterminado es 300
      edge: 'rigth', // Selecciona el origen horizontal
      closeOnClick: false // Cierra lateral de navegación en <a> clics

    });
//inicializacion de la modal 
     $('.modal-trigger').leanModal();

var $toastContent = $('<span>Bienvenido</span>');
  Materialize.toast($toastContent, 5000);

  //inicializacion calendario
  $('.datepicker').pickadate({
   selectMonths: true, // Crea un menú desplegable para controlar mes
   selectYears: 15, //Crea una lista desplegable de 15 años para controlar año
   format: 'yyyy-mm-dd',


  monthsFull: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],//monthsFull meses cortos
  monthsShort: ['Ene','Feb','Mar','Abr','May','Jun',//monthsShort meses cortos
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',//yearStatus estado del año
  weekdaysFull: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],//los días de semana larga
  weekdaysShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],//los días de semana corta
  showMonthsShort: false,//mostrar días semana corta
  showWeekdaysFull: false,//mostrar días semana completa

  today: 'Hoy',
  clear: '',
  close: 'cerrar',
  min: new Date(),
  max: new Date(2050,01,01)
 });
});


//validacion solo letras
    function Validacionletras(e){
       // keyCode se guardan las teclas especiales como (espacio , flecha izquierda, flecha derecha, Suprimir) which se guarda cual es la tecla presionada.
       key = e.keyCode || e.which;
       //String.fromCharCode(key) obteniene el caracter presionado por el usuario que añadiendo la sentencia toLowerCase() convertiríamos la letra a minúscula. Con esto guardamos la letra presionada por el usuario en la variable tecla 
       tecla = String.fromCharCode(key).toLowerCase();
       //variable letras guardamos las letras permitidas por nosotros
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       //lista de teclas especiales
       especiales = "8-37-39-46";
       tecla_especial = false
      //se busca si está la tecla presionada por el usuario en el array de teclas especiales “especiales”
       for(var i in especiales){

            if(key == especiales[i]){
                tecla_especial = true;
                //break termina la ejecucion del if 
                break;
            }
        }
        //condicional hacemos uso de la propiedad indexOf() que averigua si una cadena se encuentra dentro de otra cadena devolviendo como valor la posición de la cadena encontrada o el valor de -1 si es que no la encuentra, que para este caso queremos averiguar si el caracter presionado se encuentra entre las letras permitidas
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            //el condicional retorna falso si la tecla presionada no está en la lista de letras permitidas hecha por nosotros
            return false;
        }
    }

//menu Lider Area
var YTMenu = (function() {

  function init() {
    [].slice.call( document.querySelectorAll( '.dr-menu' ) ).forEach( function( el, i ) {

      var trigger = el.querySelector( 'div.dr-trigger' ),
        icon = trigger.querySelector( 'span.dr-icon-menu' ),
        open = false;
      trigger.addEventListener( 'click', function( event ) {
        if( !open ) {
          el.className += ' dr-menu-open';
          open = true;
        }
      }, false );
      icon.addEventListener( 'click', function( event ) {
        if( open ) {
          event.stopPropagation();
          open = false;
          el.className = el.className.replace(/\bdr-menu-open\b/,'');
          return false;
        }
      }, false );
    });
  }
  init();
})();

//menu

var MS = {};

MS.App = (function() {

  var ESCAPE_CODE = 27;

  var navButton = $('#menu-button'),
      navMenu = $('#global-nav');

  var navLinks = navMenu.find('a');

  function initApp() {
    navMenu.on('keydown', handleKeydown);
    navButton.on('click', handleClick);
    disableNavLinks();
  }
  function handleKeydown(event) {
    if (event.keyCode === ESCAPE_CODE) {
      document.body.classList.toggle('active');
      disableNavLinks();
      navButton.focus();
    }
  }
  function handleClick(event) {
    if (document.body.classList.contains('active')) {
      document.body.classList.remove('active');
      disableNavLinks();
    }
    else {
      document.body.classList.add('active');
      enableNavLinks();
      navLinks.eq(0).focus();
    }
  }
  function enableNavLinks() {
    navButton.attr('aria-label', 'Menu expanded');
    navMenu.removeAttr('aria-hidden');
    navLinks.removeAttr('tabIndex');
  }
  function disableNavLinks() {
    navButton.attr('aria-label', 'Menu collapsed');
    navMenu.attr('aria-hidden', 'true');
    navLinks.attr('tabIndex', '-1');
  }

  return {
    init: function(){
      initApp();
    }
  }
})();

$(document).ready(function($) {
  new MS.App.init();
});
//Menu principal
;
(function(win, doc) {

  if (!win.requestAnimationFrame) {
    win.requestAnimationFrame = (function() {
      return win.webkitRequestAnimationFrame ||
        win.mozRequestAnimationFrame ||
        win.oRequestAnimationFrame ||
        win.msRequestAnimationFrame ||

        function(callback) {
          return win.setTimeout(callback, 1000 / 60)
        };
    })();
  }

  if (!win.cancelAnimationFrame) {
    win.cancelAnimationFrame = (function() {
      return win.webkitCancelRequestAnimationFrame ||
        win.mozCancelAnimationFrame ||
        win.oCancelAnimationFrame ||
        win.msCancelAnimationFrame ||

        function(id) {
          return win.cancelTimeout(id)
        };
    })();
  }

  var root_element = doc.querySelector('.morph-dropdown');
  var main_nav = root_element.querySelector('.main-nav');
  var main_nav_items = main_nav.querySelectorAll('.has-dropdown');
  var ddl = root_element.querySelector('.dropdown-list');
  var ddl_wrapper = ddl.querySelector('.dropdown');
  var ddl_items = ddl.querySelectorAll('.content');
  var ddl_bg = ddl.querySelector('.bg-layer');
  var mq = checkMq();
  var vTransform = getProp(['transform', 'webkitTransform', 'mozTransform', 'msTransform', 'oTransform']);
  var resizing = false;

  for (var i = 0; i < main_nav_items.length; ++i) {
    main_nav_items[i].addEventListener('mouseenter', ddlMouseEnter, false);
    main_nav_items[i].addEventListener('mouseleave', ddlMouseLeave, false);
    main_nav_items[i].addEventListener('touchstart', ddlTouch, false);
  }

  (doc.body || doc.getElementsByTagName('body')[0]).addEventListener('click', menuClick, false);
  doc.addEventListener('keyup', ddlKeyup, false);
  ddl.addEventListener('mouseleave', ddlMouseLeave, false);
  win.addEventListener('resize', switchNavigationTypes, false);
  win.addEventListener('load', loadCSS, false);

  resetDropdown();

  function checkMq() {
    return win.getComputedStyle(root_element, '::before').getPropertyValue('content').replace(/'/g, '').replace(/"/g, '').split(', ')[0];
  }

  function ddlMouseLeave() {
    (main_nav.querySelectorAll('.has-dropdown:hover').length === 0 &&
      root_element.querySelectorAll('.dropdown-list:hover').length === 0) &&
    delay(hideDropdown());
  }

  function ddlTouch(e) {
    if (!('ontouchstart' in win)) return;
    var selectedDropdown = ddl.querySelector('#' + e.target.data('content'));
    if (!root_element.classList.contains('is-dropdown-visible') || !selectedDropdown.classList.contains('active')) {
      e.preventDefault();
      ddlMouseEnter(e);
    }
  }

  function menuClick(e) {
    if (typeof e === 'undefined') return;

    var evt = (e.target || this);
    var selector = (evt.tagName.toLowerCase());

    if (selector && !(root_element.querySelector(selector))) {
      return ddlMouseLeave();
    }

    if (evt.classList.contains('nav-trigger') || evt.classList.contains('nav-trigger-bar')) {
      typeof e !== 'undefined' && e.preventDefault();
      root_element.classList.toggle('nav-open');
    }
  }

  function ddlKeyup(e) {
    var key = e.key || e.which || e.keyCode;
    if (typeof key === 'undefined') return;
    if (key === 'Tab' || key === 9) {
      if (doc.activeElement.parentNode.classList.contains('has-dropdown')) {
        return ddlMouseEnter({
          'target': doc.activeElement.parentNode
        });
      } else if (doc.activeElement.getAttribute('tabindex')) {
        return;
      }
      //else{
      //return ddlMouseLeave();
      //}
    }
  }

  function ddlMouseEnter(e) {
    mq = checkMq();
    if (mq !== 'desktop') return;

    var item = (e.target || this);
    var this_ddl = ddl.querySelector('#' + item.getAttribute('data-content'));
    var this_ddl_height = this_ddl.clientHeight;
    var this_ddl_width = this_ddl.querySelector('.content').clientWidth;
    var this_ddl_height = this_ddl.querySelector('.content').clientHeight;
    var this_ddl_top = getOffsetTop(item) + (item.clientHeight) / 2 - this_ddl_height / 2;
    var actives = root_element.querySelectorAll('.active');

    updateDropdown(this_ddl_height, this_ddl_width, this_ddl_top);

    for (var i = 0; i < actives.length; ++i) actives[i].classList.remove('active');
    item.classList.add('active');
    this_ddl.classList.add('active');
    this_ddl.classList.remove('move-down');
    this_ddl.classList.remove('move-up');
    if (this_ddl.previousElementSibling) this_ddl.previousElementSibling.classList.add('move-down');
    if (this_ddl.nextElementSibling) this_ddl.nextElementSibling.classList.add('move-up');

    if (!root_element.classList.contains('is-dropdown-visible')) {
      win.setTimeout(function() {
        root_element.classList.add('is-dropdown-visible');
      }, 10);
    }
  }

  function updateDropdown(height, width, top) {
    ddl.style.width = width + 'px';
    ddl.style.height = height + 'px';

    //if(supportsTransforms){
    ddl.style[vTransform] = 'matrix(1,0.00,0.00,1,0,' + top + ')';
    ddl_bg.style[vTransform] = 'matrix(' + width + ',0.00,0.00,' + height + ',0,0)';

    //} else {
    //ddl.style.top = top+'px';
    //ddl_bg.style.width = width+'px';
    //ddl_bg.style.height = height+'px';
  }

  function hideDropdown() {
    mq = checkMq();
    if (mq !== 'desktop') return;
    root_element.classList.remove('is-dropdown-visible');
    var actives = root_element.querySelectorAll('.active');
    var move_lefts = root_element.querySelectorAll('.move-down');
    var move_rights = root_element.querySelectorAll('.move-up');
    for (var i = 0; i < actives.length; ++i) actives[i].classList.remove('active');
    for (var j = 0; j < move_lefts.length; ++j) move_lefts[j].classList.remove('move-down');
    for (var k = 0; k < move_rights.length; ++k) move_rights[k].classList.remove('move-up');
  }

  function resetDropdown() {
    resizing = false;
    mq = checkMq();
    if (mq !== 'mobile') return;
    ddl.removeAttribute('style');
  }

  function getHeight(el) {
    return parseInt(win.getComputedStyle(el).height.slice(0, -2));
  }

  function getWidth(el) {
    return parseInt(win.getComputedStyle(el).width.slice(0, -2));
  }

  function getOffsetTop(el) {
    return el.getBoundingClientRect().top;
  }

  function getProp(props) {
    for (var j = 0; j < props.length; j++)
      if (typeof doc.body.style[props[j]] !== 'undefined')
        return props[j];
    return '';
  }

  function rebounce(f) {
    var scheduled, context, args;
    return function() {
      context = this;
      args = [];
      for (var i = 0; i < arguments.length; ++i) args[i] = arguments[i];
      !!scheduled && win.cancelAnimationFrame(scheduled);
      scheduled = win.requestAnimationFrame(function() {
        f.apply(context, args);
        scheduled = null;
      });
    }
  }

  function delay(f) {
    var scheduled, context, args;
    return function() {
      context = this;
      args = [];
      for (var i = 0; i < arguments.length; ++i) args[i] = arguments[i];
      !!scheduled && window.cancelTimeout(scheduled);
      scheduled = window.setTimeout(function() {
        f.apply(context, args);
        scheduled = null;
      }, 50);
    }
  }

  function switchNavigationTypes() {
    if (!!resizing) return;
    resizing = true;
    return rebounce(resetDropdown());
  }

  function loadCSS() {
    var css = doc.createElement('link');
    css.href = 'https://fonts.googleapis.com/css?family=Fira+Sans:400,700';
    css.rel = 'stylesheet';
    (doc.head || doc.getElementsByTagName('head')[0]).appendChild(css);
  }

})(window, window.document);

// Volver al  superior
(function() {
 $(document).ready(function() {
    return $(window).scroll(function() {
     return $(window).scrollTop() > 200 ? $("#back-to-top").addClass("show") : $("#back-to-top").removeClass("show")
     // scrollTop Inicio de desplazamiento addClass que me adicione la clase y removeClass que me remueva esa clase
    }), $("#back-to-top").click(function() {
     return $("html,body").animate({
        scrollTop: "0"
     })
   })
  })
}).call(this);//this esta



//Validacion La primera letra en mayuscula
function validar(solicitar){
var index;
var tmpStr;
var tmpChar;
var preString;
var postString;
var strlen;
tmpStr = solicitar.value.toLowerCase();///el resto me lo ponga en minusculas
strLen = tmpStr.length;//length la longitud
if (strLen > 1)
{
for (index = 0; index < strLen; index++)
{
if (index == 0)
{
tmpChar = tmpStr.substring(0,1).toUpperCase();//lo envie me subcadena por medio de la sentencia toUpperCase me lo pasa a a mayúsculas

postString = tmpStr.substring(1,strLen);//substring cuando lo envie me subcadena
tmpStr = tmpChar + postString;
}
else
{
tmpChar = tmpStr.substring(index, index+1);
}
}
}
solicitar.value = tmpStr;
}



///validaciob del correo electronico
//el getElementById Elemento que me lo obtenga por ID que seria "email" con el addEventListener me dice que le Añadir evento traido en el input
//
document.getElementById('email').addEventListener('input', function() {
    campo = event.target;//el campo es igual  objectivo del evento
    valido = document.getElementById('emailOK');//que me muestre el mensaje por medio del id emailOK

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;//expresión
    //Se muestra un texto a modo de ejemplo
    if (emailRegex.test(campo.value)) {// la funcion test la cual se le pasa una expresión regular que ésta procesará
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";
    }
});
