
<?php

  function cartProduct(){
      return session()->get('cart');
    }
 function wishlistProduct(){
      return session()->get('wishlist');
}
