<!-- Categories navbar-->    
<nav class="catalog-nav-bar navbar-expand-md">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
       <span class="navbar-toggler-icon toggler-icon">
           <i class="fas fa-bars"></i>
       </span>
</button>

<div class="collapse navbar-collapse dual-nav" id="collapsibleNavbar">
   <ul class="navbar-nav">
       <?php //mantener link como acivo -> jquery?>
       <li class="nav-item cel"><a href="popsCatalog" class="pops nav-link" name="navpops">Figuras y Pop's</a></li>
       <li class="nav-item cel"><a href="mangaCatalog" class="manga nav-link">Manga y cómics</a></li>
       <li class="nav-item cel"><a a href="electronicsCatalog" class="electronics nav-link">Electrónica</a></li>
       <li class="nav-item cel"> <a a href="clothesCatalog" class="clothes nav-link">Ropa</a></li>
   
       <li class="nav-item cel"><a class="nav-link" href="#">Ofertas</a></li>
       <li class="nav-item cel"><a class="nav-link" href="#">Top Ventas</a></li>
   </ul>
 
   <form>
       <input type="search" name="search" placeholder="  Escribe aquí...">
       <span class="search-icon"><i class="fas fa-search"></i></span>
   </form>
 
   <div class="cart"><a href="shoppingCart">
       <p id="count"><i class="fas fa-shopping-cart"></i> 2 ITEMS:</p>
       <p id="total">245€</p>
   </a></div>
</div> 

</nav>