<div>
    payment is in the process not to press back button...
</div>
<button id="rzp-button1" style="display: none;">Pay</button>
<a href="<?php echo base_url('/studyMaterial_customizedWorkBook');?>">
    <button>Back</button>
</a> 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php  echo $key_id; ?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php  echo $order['amount']; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Alba Educations",
    "description": "Fee submission on Alba Education",
    "image": "<?php echo base_url('/public/Admin/img/Alba4.png'); ?>",
    "order_id": "<?php  echo $order['id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?php echo base_url('/studyMaterial_weeklyPlan') ?>",
    "prefill": {
        // "name": "yeha pe customer data echo karwa sakte hai ",
        // "email": "",
        // "contact": ""
    },
    "notes": {
        "address": "Alba educations"
    },
    "theme": {
        "color": "#ff5e14"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
document.getElementById('rzp-button1').click();
</script>