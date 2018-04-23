<link href="{{ URL::asset('public/block/company/style.css') }}" rel="stylesheet" type="text/css">
<div class="generate_company add_btn">
    <span class="fa-stack">
        <i class="fa fa-plus fa-stack-1x" aria-hidden="true"></i>
        <i class="fa fa-circle-o fa-stack-2x" aria-hidden="true"></i>
    </span>
    <span class="hidden-title">Добавить компанию</span>
</div>
<?$arCompanies = \App\Company::all()?>
<?//dd()?>
<div class="container">
    <?foreach($arCompanies as $arCompany){?>
    <div class="company_box">
        <div class="company_name"><?=$arCompany->name?></div>
        <div class="company_info">
            <div class="company_money">
                <i class="fa fa-money left" aria-hidden="true"></i>
                <div class="company_money_count left"><?=$arCompany->money?></div>
                <div class="company_frofit left"><?=$arCompany->frofit?></div>
            </div>
            <div class="company_worker">
                <div class="worker_contain left">
                    <?for($i=0;$i<$arCompany->workplace;$i++){?>
                        <i class="fa fa-user-o left" aria-hidden="true"></i>
                    <?}?>
                </div>
                <div class="add_worker left">+</div>
            </div>
            <div class="company_material">
                <div class="material_name left">material</div>
                <i class="fa fa-th-large left" aria-hidden="true"></i>
                <div class="material_percent">25%</div>
            </div>
            <div class="company_product">
                <div class="product_name left">product</div>
                <i class="fa fa-th-large left" aria-hidden="true"></i>
                <div class="product_count">шт.</div>
            </div>
        </div>
    </div>
    <?}?>
</div>

<script src="{{ URL::asset('public/block/company/script.js') }}"></script>