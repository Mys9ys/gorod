<link href="{{ URL::asset('public/block/product_setting/style.css') }}" rel="stylesheet" type="text/css">

<?$arProduct = \App\Library_product::all()?>
<?$arCategory = \App\Product_category::all()?>
<?$arTreasure = \App\Treasury::find($_COOKIE['CountryID'])?>
<?//dd($arTreasure)?>
<div class="product_table">
    <?if(!empty($arProduct)){?>
        <?foreach($arProduct as $product){

        }?>
    <?}?>
    <div class="product_row">
        <input class="product_name product_input" type="text" placeholder="Название">
        <select class="product_sector" id="">
            <?foreach ($arCategory as $category){?>
                <option value="<?=$category['id']?>" class="sector_option"><?=$category['name']?></option>
            <?}?>
        </select>
        <input class="product_make_in_day product_input" data-mrot="<?=$arTreasure['mrot']?>" type="text" data-name="make_in_day">
        <input class="product_FOT product_input" type="text" disabled title="MROT: <?=$arTreasure['mrot']?>">
        <input class="product_formula product_input" type="text" placeholder="формула">
        <div class="product_detail">
            <div class="add_detail add_btn">+</div>
        </div>
        <input class="product_count_detail_material product_input" type="hidden">
        <input class="product_amortization product_input" type="text" data-name="amortization">
        <input class="product_pack product_input" type="text" data-name="pack">
        <input class="product_profit product_input" type="text" disabled>
        <input class="product_transport product_input" type="text" disabled>
        <input class="product_shop_profit product_input" type="text" disabled>
        <input class="product_NDS product_input" type="text" data-nds="<?=$arTreasure['nds']?>" disabled title="NDS: <?=$arTreasure['nds']?>">
        <input class="product_total product_input" type="text" disabled>
        <div class="product_add_confirm">ok</div>
    </div>
</div>

<script src="{{ URL::asset('public/block/product_setting/script.js') }}"></script>