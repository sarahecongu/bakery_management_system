<?php
if (isset($_SESSION['message'])) {
    echo '<script>';
    echo 'let sessionMessage = "' . $_SESSION['message'] . '";';
    echo 'sessionStorage.setItem("message", "' . $_SESSION['message'] . '");';
    echo 'console.log(sessionMessage);';
    echo '</script>';
}


if (isset($_SESSION['message'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">

        <div id="liveToast" class="alert alert-<?php echo $_SESSION['status'] ?> d-flex align-items-center" role="alert">
            <?php if ($_SESSION['status'] == 'success'): ?>
                <i class="fa fa-check-circle bi flex-shrink-0 me-2" width="24" height="24" role="img"
                    aria-label="<?php echo $_SESSION['status'] ?>:">
                    <use xlink:href="#check-circle-fill" />
                </i>
            <?php else: ?>
                <i class="fa fa-circle-xmark bi flex-shrink-0 me-2" width="24" height="24" role="img"
                    aria-label="<?php echo $_SESSION['status'] ?>:">
                    <use xlink:href="#check-circle-fill" />
                </i>
            <?php endif; ?>

            <?php echo $_SESSION['message']; ?>
        </div>
    </div>

<?php endif; ?>
