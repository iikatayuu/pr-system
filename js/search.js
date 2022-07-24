
$(document).ready(function () {
  const indicatorTemp = $('#temp-indicator').prop('content')
  const resultTemp = $('#temp-result').prop('content')

  $('#form-search').submit(async function (event) {
    event.preventDefault()

    const form = this
    const action = $(form).attr('action')
    const method = $(form).attr('method')
    const data = new FormData(this)

    $(form).find('[type="submit"]').attr('disabled', true)
    $(form).find('[type="submit"] .spinner-border').removeClass('d-none')
    $(form).find('[type="submit"] .submit-status').text('Loading...')
    $('#search-status').addClass('d-none').empty()

    try {
      const res = await $.ajax(action, {
        method: method,
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false
      })

      if (res.success) {
        $('#results,#indicators').empty()
        $('#results-container').removeClass('d-none')
        $('#results-count').text(res.results.length)

        for (let i = 0; i < res.results.length; i++) {
          const result = res.results[i]
          const elem = $(resultTemp).clone(true, true)
          const indicator = $(indicatorTemp).clone(true, true)
          const date = new Date(result.date)

          for (let j = 0; j < result.images.length; j++) {
            const src = result.images[j]
            const img = $('<img />', {
              src: src,
              alt: result.name,
              width: 300,
              className: 'img-thumbnail mx-2'
            }).click(fullImage)

            $(elem).find('.result-imgs').append(img)
          }

          if (i === 0) {
            $(elem).find('.carousel-item').addClass('active')
            $(indicator).find('.indicator').addClass('active').attr({
              'aria-current': true,
              'aria-label': 'Slide ' + (i + 1)
            })
          }

          $(indicator).find('.indicator').attr('data-bs-slide-to', i)
          $(elem).find('.dept-name').text(result.name)
          $(elem).find('.doc-date').text(date.toDateString())

          $('#indicators').append(indicator)
          $('#results').append(elem)
        }
      } else {
        $('#search-status').removeClass('d-none').text(res.message)
      }
    } catch (error) {
      $('#search-status').removeClass('d-none').text(error.message)
    }

    $(form).find('[type="submit"]').attr('disabled', null)
    $(form).find('[type="submit"] .spinner-border').addClass('d-none')
    $(form).find('[type="submit"] .submit-status').text('Search')
  })

  function fullImage (event) {
    const src = $(this).attr('src')
    const alt = $(this).attr('alt')
    const modal = bootstrap.Modal.getOrCreateInstance('#full-image')

    $('#full-image').find('.full-image-img').attr({
      src: src,
      alt: alt
    })

    modal.show()
  }
})
