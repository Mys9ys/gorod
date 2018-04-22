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
    </div>

    <?}?>
</div>

<script src="{{ URL::asset('public/block/company/script.js') }}"></script>