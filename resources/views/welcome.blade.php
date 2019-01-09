@include('layouts.header')

@include('block.main_menu')
<div class="container">
    <?$country = \App\Country::all();?>
    <?if(count($country)<=0){?>
        <button class="startGame stndrt_bnt">Начать</button>
    <?}?>
</div>

@include('layouts.footer')