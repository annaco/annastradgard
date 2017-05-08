$(document).ready(function() {
  var place = '<div class="title_singlepage">Placering</div>';
  var pruning = '<div class="title_singlepage">Beskärning</div>';
  var details = '<div class="title_singlepage">Fakta</div>';
  var food = '<div class="title_singlepage">Föda</div>';
  var text = '<div class="title_singlepage">Beskrivning</div>';
  var cure = '<div class="title_singlepage">Botemedel</div>';

  $('.place').prepend(place);
  $('.pruning').prepend(pruning);
  $('.details').prepend(details);
  $('.food').prepend(food);
  $('.text').prepend(text);
  $('.cure').prepend(cure);

  tinymce.init({
    selector: 'textarea'
  });

  $('.textarea').submit(function(e) {
    var content = tinymce.get('texteditor').getContent();
    $('.data-container').html(content);
    return false;
  });
  $('#i-nav').click(function() {
    $(this).toggleClass('open');
    $('ul').toggleClass('show');
  });
  $('.login_btn').click(function() {
    console.log('logga in');
  });
});

