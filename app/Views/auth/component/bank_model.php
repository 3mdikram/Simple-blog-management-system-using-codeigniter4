<!-- Modal -->
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/jquery-ui/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<?= $this->endSection(); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title offset-4">Add New Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="text-success success-error"></span>
                <form class="myForm formhelper">
                    <div class="form-group">
                        <label>Bank Name.</label>
                        <input type="text" name="bankname" class="form-control" id="bankname" placeholder="Bank Name">
                        <span class="bnamerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Account No.</label>
                        <input type="text" name="accountno" class="form-control accountno" id="accountno" placeholder="Account No.">
                        <span class="actnoerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" name="ifscode" class="form-control" id="ifsc-code" placeholder="IFSC Code.">
                        <span class="ifscerror text-danger"></span>
                        <input type="text" name="bankids" class="form-control" id="bId" hidden>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="helperclass btn btn-primary w-100" value="Add Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //Account Number Check
        $(".accountno").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        // Remove Error
        $("#bankname").on("input",function(){
            $(".bnamerror").html("");
        })
        $("#accountno").on("input",function(){
            $(".actnoerror").html("");
        })
        $("#ifsc-code").on("input",function(){
            $(".ifscerror").html("");
        })
        //Open Model
        $(document).on('click', "#openmodel", function() {
            $(".helperclass").removeClass("update-btn-bnkdata");
            $(".helperclass").addClass("addbankbtn")
            $(".formhelper").removeClass("BankUpdForm");
            $(".formhelper").addClass("myForm");
            $(".modal-title").html("Add New Bank");
            $(".addbankbtn").val("Add Now");
            $('.myForm')[0].reset();
            $("#exampleModal").modal("show");
        });
        // Model Data Insert
        $(document).on('click', ".addbankbtn", function(e) {
            e.preventDefault();
            var bankName = $("#bankname").val();
            var bankaacount = $("#accountno").val();
            var bankifsc = $("#ifsc-code").val();
            if (bankName == "") {
                $(".bnamerror").html("Bank Name Required!");
            }else if (bankaacount == "") {
                $(".actnoerror").html("Account No. Required!");
            }else if (bankifsc == "") {
                $(".ifscerror").html("IFSC Code Required!");
            } else {
                $.ajax({
                    url: '<?php echo base_url('Auth/Bank/Addbank'); ?>',
                    type: 'POST',
                    data: $('.myForm').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $(".success-error").addClass("offset-3");
                        $(".success-error").html('Successfully New Bank Added!').fadeIn();
                        $(".success-error").fadeOut(8000);
                        $('.myForm')[0].reset();
                    },
                    error: function() {
                        alert('Error inserting data');
                    }
                });
            }
        });
        // UpdateBank Data
        $(document).on("click", ".update-bnk-data", function() {
            $(".helperclass").addClass("update-btn-bnkdata");
            $(".formhelper").removeClass("myForm");
            $(".formhelper").addClass("BankUpdForm");
            $(".modal-title").html("Update Bank Data");
            $(".update-btn-bnkdata").val("Update Now");
            $("#exampleModal").modal("show");
            var bankname = $(this).data("bnkn");
            var ifscode = $(this).data("ifss");
            var actno = $(this).data("acnt");
            var bankId = $(this).data("bankid");
            $("#bankname").val(bankname);
            $("#ifsc-code").val(ifscode);
            $("#accountno").val(actno);
            $("#bId").val(bankId);
        });
        $(document).on('click', ".update-btn-bnkdata", function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url('Auth/Bank/updateBank'); ?>',
                type: 'POST',
                data: $('.BankUpdForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    $(".success-error").addClass("offset-4");
                    $(".success-error").html('Successfully Updated').fadeIn();
                    $(".success-error").fadeOut(8000);
                },
                error: function() {
                    alert('Error updating data');
                }
            });
        });
    });
</script>