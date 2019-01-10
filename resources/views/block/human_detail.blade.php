<link href="{{ URL::asset('public/block/human_detail/style.css') }}" rel="stylesheet" type="text/css">

<?$arHuman = \App\Human::find($_GET['id'])?>
<div class="human_title"><?=$title?></div>
<div class="human_info">

</div>
<div class="human_pays">
    <div class="human_money money_block">
        <div class="block_title">На счету</div>
        <div class="block_count"><?=$arHuman->money?></div>
    </div>
</div>

<script src="{{ URL::asset('public/block/human_detail/script.js') }}"></script>