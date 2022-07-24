
$(document).ready(function () {
  const previewTemp = $('#temp-preview').prop('content')

  $('#images').on('change', function (event) {
    const files = $(this).prop('files')
    $('#preview').empty()

    if (files.length > 0) {
      for (let i = 0; i < files.length; i++) {
        const file = files[i]
        const elem = $(previewTemp).clone(true, true)
        const url = URL.createObjectURL(file)
        $(elem).find('.img-thumbnail').attr({
          src: url,
          alt: 'Preview ' + i
        })

        $('#preview').append(elem)
      }
    }

    $('#preview-container').toggleClass('d-none', files.length === 0)
  })

  $('#form-submit').submit(async function (event) {
    event.preventDefault()

    const form = this
    const action = $(form).attr('action')
    const method = $(form).attr('method')
    const data = new FormData()
    const dept = $('#department').val()
    const date = $('#date').val()
    const files = $('#images').prop('files')

    $(form).find('[type="submit"]').attr('disabled', true)
    $(form).find('[type="submit"] .spinner-border').removeClass('d-none')
    $(form).find('[type="submit"] .submit-status').text('Loading...')
    $('#submit-status').removeClass('border-danger border-success').addClass('d-none').empty()

    data.append('department', dept)
    data.append('date', date)
    for (let i = 0; i < files.length; i++) {
      const file = files[i]
      data.append('images[]', file)
    }

    try {
      const res = await $.ajax(action, {
        method: method,
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false
      })

      if (res.success) {
        $('#submit-status').removeClass('d-none border-danger').addClass('border-success').text('Submitted successfully')
        $('#department').prop('selectize').clear()
        $(form).trigger('reset')
      } else {
        $('#submit-status').removeClass('d-none border-success').addClass('border-danger').text(res.message)
      }
    } catch (error) {
      $('#submit-status').removeClass('d-none border-success').addClass('border-danger').text(error.message)
    }

    $(form).find('[type="submit"]').attr('disabled', null)
    $(form).find('[type="submit"] .spinner-border').addClass('d-none')
    $(form).find('[type="submit"] .submit-status').text('Submit')
    $('#preview').empty()
    $('#preview-container').addClass('d-none')
  })
})
