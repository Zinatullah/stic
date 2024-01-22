<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <!-- <h3 class="modal-title fs-5" id="staticBackdropLabel" style="text-align: center;">Contribution</h3> -->
            </div>
            <div class="modal-body">
                <?php echo $contribution_message ?>
            </div>
            <div class="modal-footer">
                <button style="padding: 5px; width:50px" type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $no ?></button>
                <a href="./login.php">
                    <button style="padding: 5px; width: 50px;" type="button" class="btn btn-primary"><?php echo $yes ?></button>
                </a>
            </div>
        </div>
    </div>
</div>