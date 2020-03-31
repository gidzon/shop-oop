window.onload = function () {
    var button = document.querySelector('#button')

    
    function showValue() {
      var number = document.querySelector('#number').value
      var price = document.querySelector('#price').textContent
      var idProduct =  button.getAttribute('dataid')
      var idUser = button.getAttribute('userId')

      var data = "id=" + idProduct + "&number=" + number + "&price=" + price + "&userid=" + idUser
      

      var xhr = new XMLHttpRequest()
      xhr.open('GET', "handler/cart.php?" + data)
      xhr.send()
      
    }

    button.addEventListener('click', showValue)

    
  
  }

