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
        <input class="product_name product_input" type="text" placeholder="Название" data-name="name">
        <select class="product_sector product_input" data-name="sector" title="сектор">
            <?foreach ($arCategory as $category){?>
                <option value="<?=$category['id']?>" class="sector_option"><?=$category['name']?></option>
            <?}?>
        </select>
        <input class="product_make_in_day product_input" data-mrot="<?=$arTreasure['mrot']?>" type="text" data-name="make_in_day" title="Выработка в день">
        <input class="product_FOT product_input" type="text" disabled title="MROT: <?=$arTreasure['mrot']?>" data-name="FOT" >
        <?if(!empty($arProduct)){selectProductBlock('formula', 'Сырье');}?>
        <input class="product_count_detail_material product_input" type="hidden">
        <input class="product_amortization product_input" type="text" data-name="amortization" title="амортизация">
        <input class="product_pack product_input" type="text" data-name="pack" title="тара">
        <input class="product_profit product_input" type="text" disabled data-name="profit" title="прибыль">
        <input class="product_transport product_input" type="text" disabled data-name="transport" title="транспорт">
        <input class="product_shop_profit product_input" type="text" disabled data-name="shop_profit" title="прибыль магазина">
        <input class="product_NDS product_input" type="text" data-nds="<?=$arTreasure['nds']?>" disabled title="NDS: <?=$arTreasure['nds']?>" data-name="NDS">
        <input class="product_total product_input" type="text" disabled data-name="total" title="Конечная цена">
        <div class="product_add_confirm">ok</div>
    </div>
</div>
<?
function selectProductBlock($selector, $name){?>
    <div class="add_<?=$selector?> add_btn_product" id="add_<?=$selector?>">+</div>
<div id="addProductModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" style="float:right;padding:5px 10px 0 0;z-index:1;position:relative;">&times;</button>
            <div class="modal-header">
                <h4 class="modal-title"><?=$name?></h4>
            </div>
            <div class="modal-body">
                <input type="search" class="search_input"><i class="fa fa-search"></i>
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
            <div class="modal-footer">
                <div class="confirm_add_btn_product">Добавить</div>
            </div>
        </div>

    </div>
</div>
<?}?>
<script src="{{ URL::asset('public/block/product_setting/script.js') }}"></script>