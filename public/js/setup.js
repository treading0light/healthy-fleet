function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}


// when a continue button is clicked, the active element is turned off and the next
// in line is made visible.

$('#main').find('.continue').on('click', function() {
  // fill empty .message div with string message.
  if ($(this).siblings('.message').length) {
      $(this).siblings('.message').append('Got it, here we go!')
  }
  sleep(500)

  // adding the "off" class changes display to none
  $(this).parent().addClass('off')
  $(this).parent().next().removeClass('off')
})

// prevent form submit on keypress 'enter'
$('#setup input').on('keydown', function(e) {
  if (e.keyCode == 13) {
    e.preventDefault()
    if ($(this).next('.continue').length) {
      $(this).next('.continue').trigger('click')
    } else {
      $(this).parent().siblings('.continue').trigger('click')
    }
    
  }
})

// show option to add departments
$('#question').children('.button.yes').on('click', function() {
  $('#department').removeClass('off')
})

$('#question').children('.button.no').on('click', function() {
  $('#department').addClass('off')
})

// Hide messages and errors when an input field gains focus
$('#setup').children('input').on('focus', function() {
  $('#error').addClass('off')
  $('#message').addClass('off')
})