<div class="qr-container design">
    <div class="background">
        <img src="<?= DCMS_CUSTOMAREA_URL . 'assets/img/design-2.svg' ?>" alt="fondo">
    </div>
    <div class="user-qr">
        <img  src="<?= $img_qr_user ?>" alt="user-qr"">
    </div>
</div>



<style>
    .qr-container {
        position: relative;
        width: 500px;
        height: 500px;
    }

    .qr-container .user-qr{
        position: absolute;
        z-index: 9999;
        width:500px;
        height:500px;
    }

    .qr-container .user-qr img{
        width: 160px;
        height: 160px;
    }


    .qr-container.design .background{
        position:absolute;
        z-index: 0;
        width: 500px;
        height: 500px;
    }

    .qr-container.design .user-qr{
        top: 170px;
        left: 220px;
    }

</style>

