<div class="qr-container design">
    <div class="background">
        <img src="<?= DCMS_CUSTOMAREA_URL . 'assets/img/design-1.svg' ?>" alt="fondo" width="380">
    </div>
    <div class="user-qr">
        <img src="<?= $img_qr_user ?>" alt="user-qr"">
    </div>
</div>

<style>
    .qr-container {
        position: relative;
        width: 380px;
        height: 380px;
    }

    .qr-container .user-qr {
        position: absolute;
        z-index: 9999;
        width: 380px;
        height: 380px;
    }

    .qr-container .user-qr img {
        width: 190px;
        height: 190px;
    }


    .qr-container.design .background {
        position: absolute;
        z-index: 0;
        width: 380px;
        height: 380px;
    }

    .qr-container.design .user-qr {
        top: 170px;
        left: 275px;
    }
</style>