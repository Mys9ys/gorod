<link href="{{ URL::asset('public/block/company_detail/style.css') }}" rel="stylesheet" type="text/css">

<?$arCompany = \App\Company::find($_GET['id'])?>
<div class="company_title"><?=$title?></div>
<div class="company_worker">
    <div class="company_worker_title">Сотрудники:</div>
    <div class="worker_contain left">
        <?if(isset($arCompany->workers)){
            $workers = array_diff(explode(';', $arCompany->workers), array(''));
            $workers_count=count($workers);
            foreach ($workers as $worker){?>
            <i class="fa fa-user left" aria-hidden="true" data-toggle="tooltip" data-placement="top"
               data-html="true" data-title="<?=\App\Human::find($worker)['name']?><br>Money: <?=\App\Human::find($worker)['money']?>"></i>
            <?}?>
        <?}?>
            <?for($i=0;$i<$arCompany->workplace;$i++){?>
            <i class="fa fa-user-o add_worker left" aria-hidden="true" data-companyID="<?=$arCompany->id?>"></i>
        <?}?>
    </div>
    <div class="add_worker add_worker_btn left" data-companyID="<?=$arCompany->id?>">+</div>
</div>
<div class="company_info">
    <div class="company_pays">
        <div class="company_pays_title">Движение денежных средств:</div>
        <div class="company_money money_block">
            <div class="block_title">На счету</div>
            <div class="block_count"><?=$arCompany->money?></div>
        </div>
        <div class="company_income_money money_block">
            <div class="block_title">Приход</div>
            <div class="block_count"><?=$arCompany->income_money?></div>
        </div>
        <div class="company_cost_money money_block">
            <div class="block_title">Расход</div>
            <div class="block_count"><?=$arCompany->cost_money?></div>
        </div>
        <div class="company_profit money_block">
            <div class="block_title">Прибыль</div>
            <div class="block_count"><?=$arCompany->profit?></div>
        </div>
    </div>
</div>


<script src="{{ URL::asset('public/block/company_detail/script.js') }}"></script>