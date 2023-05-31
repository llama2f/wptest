<script>
$(function() {
  //クリックで動く
  $('.faq-open').click(function() {
    $(this).toggleClass('active');
    $(this).next('dd').slideToggle();
  });
});
</script>