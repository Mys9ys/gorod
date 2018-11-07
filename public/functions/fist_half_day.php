<?
function fist_half_day(){
   ?>
    <script>
        $(document).ready(function(){
            $('body').append('<div class="loader_wrapper"><i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i></div>')
        });
    </script>
    <?
}?>
<style>
    .loader_wrapper{
        position: absolute;
        top: 0;
        background: rgba(40,40,40, 0.1);
        width: 100%;
        height: 100vh;
    }
    .fa-spinner{
        position: absolute;
        top:50%;
        left:50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>