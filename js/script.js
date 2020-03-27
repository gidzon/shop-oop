window.onload = function () {
    var button = document.querySelector('#button')
    var idProduct = document.querySelector('#button')

    var price = document.querySelector('#price').textContent

    idProduct.getAttribute('data-id')

    button.addEventListener('click', showValue)
    
    function showValue() {
      var number = document.querySelector('#number').value
      var data = "id=" + idProduct + "&number" + number + "&price" + price;

      var xhr = new XMLHttpRequest()
      xhr.open('GET', "handler.php?" + data)
      xhr.send()
    }
  
  }