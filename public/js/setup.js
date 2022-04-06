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


$('#number').on('change', 'input', function() {
  let number = $(this).val()
})

// show option to add departments
$('#question').children('.button.yes').on('click', function() {
  $('#department').removeClass('off')
})

$('#question').children('.button.no').on('click', function() {
  $('#department').addClass('off')
})


