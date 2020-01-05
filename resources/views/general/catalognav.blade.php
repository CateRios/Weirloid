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
       <li class="nav-item cel"><a id="navLink1" href="popsCatalog" class="pops nav-link">Figuras y Pop's</a></li>
       <li class="nav-item cel"><a id="navLink2" href="mangaCatalog" class="manga nav-link">Manga y cómics</a></li>
       <li class="nav-item cel"><a id="navLink3" href="electronicsCatalog" class="electronics nav-link">Electrónica</a></li>
       <li class="nav-item cel"> <a id="navLink4" href="clothesCatalog" class="clothes nav-link">Ropa</a></li>
   
       <li class="nav-item cel"><a class="nav-link" href="#">Ofertas</a></li>
       <li class="nav-item cel"><a class="nav-link" href="#">Top Ventas</a></li>
   </ul>
 
   <form>
       <input type="search" name="search" placeholder="  Escribe aquí...">
       <span class="search-icon"><i class="fas fa-search"></i></span>
   </form>
 
   {{App\Http\Controllers\ShoppingCartController::showCartOnNavBar()}}
   
</div> 

<script>activeLinkNav()</script>

</nav>