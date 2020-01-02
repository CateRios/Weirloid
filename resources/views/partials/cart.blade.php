<!---->

<?php

        if(session()->exists('cart')){

        $cartProducts = session()->get('cart');
        //dd($cartProducts);
        $items_number=count($cartProducts);
               
?>

        <div class="cart"><a href="shoppingCart">
                <p id="count"><i class="fas fa-shopping-cart"></i> <?=$items_number?> ITEMS:</p>
                <p id="total">X</p>
            </a></div>

<?php
        }else{
?>
            <div class="cart"><a href="#">
                <p id="count"><i class="fas fa-shopping-cart"></i> 0 ITEMS</p>
                </a></div>
<?php
        }
?>