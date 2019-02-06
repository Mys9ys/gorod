<link href="{{ URL::asset('public/block/product_setting/style.css') }}" rel="stylesheet" type="text/css">

<?$arProduct = \App\Library_product::all()->take(2)?>
<?$arCategory = \App\Product_category::all()?>
<?$arTreasure = \App\Treasury::find($_COOKIE['CountryID'])?>
<?//dd($arProduct)?>
<div class="product_table">
    <?if(!empty($arProduct)){?>
        <?foreach($arProduct as $product){
//            dd($product->name);
        }?>
    <?}?>
    <div class="product_row">
        <label for="product_name">
            <div class="title_item">Название</div>
            <input class="product_name product_input" type="text" placeholder="Название" data-name="name">
        </label>
        <label for="product_sector">
            <div class="title_item">Сектор</div>
            <select class="product_sector product_input" data-name="sector" title="сектор">
                <?foreach ($arCategory as $category){?>
                <option value="<?=$category['id']?>" class="sector_option"><?=$category['name']?></option>
                <?}?>
            </select>
        </label>
        <label for="product_make_in_day">
            <div class="title_item">1 ч/день</div>
            <input class="product_make_in_day product_input" data-mrot="<?=$arTreasure['mrot']?>" type="text" data-name="make_in_day" title="Выработка в день">
        </label>
        <label for="product_FOT">
            <div class="title_item">ФОТ</div>
            <input class="product_FOT product_input" type="text" disabled title="MROT: <?=$arTreasure['mrot']?>" data-name="FOT" >
        </label>
        <label for="">
            <div class="title_item">Сырье</div>
            <div class="add_btn_product" id="add_formula" data-selector="formula" data-title="Сырье" data-selector_count="product_count_detail_material">+</div>
            <input type="hidden" class="product_formula product_input" disabled title="Формула" data-name="formula">
        </label>
        <label for="product_count_detail_material">
            <div class="title_item">Сырье $</div>
            <input class="product_count_detail_material product_input" disabled title="Стоимость сырья">
        </label>
        <label for="product_amortization">
            <div class="title_item">Амортизация</div>
            <input class="product_amortization product_input" type="text" data-name="amortization" title="амортизация">
        </label>
        <label for="">
            <div class="title_item">Тара</div>
            <div class="add_btn_product" id="add_formula" data-selector="pack" data-title="Тара" data-selector_count="product_pack_count">+</div>
            <input type="hidden" class="product_pack product_input" disabled title="Тара" data-name="pack">
        </label>
        <label for="product_pack">
            <div class="title_item">Тара $</div>
            <input class="product_pack_count product_input" type="text" data-name="pack" title="тара">
        </label>
        <label for="product_profit">
            <div class="title_item">Прибыль</div>
            <input class="product_profit product_input" type="text" disabled data-name="profit" title="прибыль">
        </label>
        <label for="product_transport">
            <div class="title_item">Транспорт</div>
            <input class="product_transport product_input" type="text" disabled data-name="transport" title="транспорт">
        </label>
        <label for="">
            <div class="title_item">Прибыль магазина</div>
            <input class="product_shop_profit product_input" type="text" disabled data-name="shop_profit" title="прибыль магазина">
        </label>
        <label for="">
            <div class="title_item">НДС <?=$arTreasure['nds']?></div>
            <input class="product_NDS product_input" type="text" data-nds="<?=$arTreasure['nds']?>" disabled title="NDS: <?=$arTreasure['nds']?>" data-name="NDS">
        </label>
        <label for="">
            <div class="title_item">Итого</div>
            <input class="product_total product_input" type="text" disabled data-name="total" title="Конечная цена">
        </label>
        <div class="product_add_confirm">ok</div>
    </div>
</div>

<div id="addProductModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" style="float:right;padding:5px 10px 0 0;z-index:1;position:relative;">&times;</button>
            <div class="modal-header"></div>
            <div class="modal-body">
                <input type="search" class="search_input"><i class="fa fa-search"></i><i class="fa fa-trash" aria-hidden="true"></i>
                <div class="product_formula"></div>
                <div class="product_formula_summ"></div>
                <input class="product_formula_bd" type="hidden">
                <div class="product_select_box">
                    <?$arProdTest = array(
                        array('name' => 'Вода', 'price' => '0.05'),
                        array('name' => 'Глина', 'price' => '0.09')
                    )?>
                    <?foreach ($arProdTest as $key => $prod){?>
                    <div class="select_item" data-id="<?=$key?>">
                        <div class="select_item_title name"><?=$prod['name']?></div>
                        <div class="select_item_price price"><?=$prod['price']?></div>
                    </div>
                    <?}?>
                </div>
                <?$arCalculate = array(0.1,0.2,0.5,1,2,5,10,25,50,100)?>
                <div class="product_calculate">
                    <?foreach ($arCalculate as $key=>$value){?>
                    <div class="calculate_value" data-value="<?=$value?>"><?=$value?></div>
                    <?}?>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('public/block/product_setting/script.js') }}"></script>