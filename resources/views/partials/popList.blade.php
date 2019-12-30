<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Product;


$products= Product::all();

foreach($products as $item){
    $id =$item->id;
    $name = $item->name;
    $price = $item->price;
    $category = $item->class;
    $img = base64_encode($item->image);
    $score = $item->score;

    ?>
    <div class="card-columns productList">
        <!-- Product Card -->
        <div class="card productCard">
            <a href='popDetail/<?=$id?>'><img class="card-img-top productCard-image" src="{{base64_encode(<?=$item->image?>)}}" alt="<?=$name?>"></a>
            <div class="productCard-price">
                <h4 class="card-title"><?=$price?>€</h4>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 productCard-category"><?=$category?></h6>
                <h5 class="card-title productCard-name"><?=$name?></h5>

    <?php
        $i=1;
        for($i=1; $i <= $score; $i++){
            echo "<span class='fa fa-star checked'></span>";
        }
        while($i <=5){
            echo "<span class='fa fa-star'></span>";
            $i++;
        }

    
    ?>

            </div>
        </div>
    </div>
<?php
}
?>