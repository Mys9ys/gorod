<link href="{{ URL::asset('public/block/human/style.css') }}" rel="stylesheet" type="text/css">
<div class="generate_human add_btn">
    <span class="fa-stack">
        <i class="fa fa-plus fa-stack-1x" aria-hidden="true"></i>
        <i class="fa fa-circle-o fa-stack-2x" aria-hidden="true"></i>
    </span>
    <span class="hidden-title">Добавить человечков</span>
</div>
<?$arHumans = \App\Human::all();?>
<?//dd()?>
<div class="container">
    <?foreach($arHumans as $arHuman){?>
        <div class="human_box">
            <a class="info_btn" href="{{ route('human_detail', ['id' => $arHuman->id]) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            <div class="human_name"><?=$arHuman->name?></div>
            <div class="human_info">
                <div class="human_money">
                    <i class="fa fa-money left" aria-hidden="true"></i>
                    <div class="human_money_count left"><?=$arHuman->money?></div>
                </div>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <i class="fa fa-id-badge" aria-hidden="true"></i>
            </div>
        </div>
    <?}?>
</div>

<script src="{{ URL::asset('public/block/human/script.js') }}"></script>