<div class="bg-gray">
  <div class="fullWidth">
    <div class="popular-city">
    <div class="title">Popular Cities</div>
      <ul>
          <?php 
          $query = $conn->query("CALL get_popular_cities('total', '35')");
          while($result = $query->fetch_object()) 
          {
              $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $result->name));	
          ?>
            <li><a href="<?php echo "/destination/$slug/".$result->id; ?>"><?php echo $result->name; ?></a></li>
          <?php 
          }
            $query->close();
            $conn->next_result();
            ?>
    </div>
  </div>
</div>

<!--footer-->
<div class="footer_wra">
  <div class="container">

    <div class="social">
      <a href="https://www.facebook.com/DiscountTours/" target="_blank" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="https://twitter.com/DiscountTours" target="_blank" class="twi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/DiscountTours" target="_blank" class="insta"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>

    <div class="footer">
      <ul>
        <li><a href="<?php echo APPROOT; ?>about-us">About Us</a></li>
        <li><a href="<?php echo APPROOT; ?>contact-us">Help Center</a></li>
        <li><a href="<?php echo APPROOT; ?>privacy-policy">Privacy Policy</a></li>
        <li><a href="<?php echo APPROOT; ?>blog">News</a></li>
        <li><a href="<?php echo APPROOT; ?>sitemap">Sitemap</a></li>
      </ul>
    </div>
   </div>
</div>
<!--end footer-->
<!--footer 2-->
<div class="footer_wra2">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          Copyright <?=date('Y');?> © Discount Tours.  All rights reserved. 
          <a href="<?php echo APPROOT; ?>terms-and-conditions">Terms and Conditions</a>
      </div>
     </div>
   </div>
</div>
<!--end footer 2-->

<!--Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header close_wra">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="covid_txt">
           <img src="<?php echo IMAGEROOT; ?>Discount-Tours-Logo.png" alt="Discount-Tours-Logo.png" class="img-res logo_mobile" height="55">
           <p>IMPORTANT UPDATE</p>
           <p>As of <?php echo date('M d, Y'); ?>, proof of COVID-19 vaccination with photo ID is required for restaurants and bars, casinos, concerts, theatres, cinemas, recreation and sporting facilities, festivals and more. Capacity limits for indoor and outdoor activities are based on maintaining a physical distance of 2m/6ft from others. Please follow all public health guidelines to stop the spread of COVID-19.</p>

            <p>Keeping workplaces, staff and guests safe is our destination's primary focus. Key public health measures are in place and we all share a responsibility to stay informed, be prepared, be flexible and follow health and safety guidelines.</p>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
<!--End Modal-->


<script src="<?php echo APPROOT; ?>js/jquery.min.js?v1.11.2"></script>
<script src="<?php echo APPROOT; ?>js/bootstrap.min.js?v3.3.7"></script>
<script src="<?php echo APPROOT; ?>js/script.js?v1.0.1"></script>

<script>
$(function(){
	$('.closeTop').click(function(){ $('.covid_wra').fadeOut(500); });
});
</script>

<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
<!--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
<!--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
<!--'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
<!--})(window,document,'script','dataLayer','GTM-W8WKKS2');</script>-->
<!-- End Google Tag Manager -->

<?php /*?><script type="text/javascript"> (function() { var co=document.createElement("script"); co.type="text/javascript"; co.async=true; co.src="https://xola.com/checkout.js"; var s=document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(co, s); })(); </script><?php */?>

<?php /*?><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99013448-1', 'auto');
  ga('send', 'pageview');

</script>

<!--Begin Comm100 Live Chat Code-->
<div id="comm100-button-274"></div>
<script type="text/javascript">
  var Comm100API=Comm100API||{};(function(t){function e(e){var a=document.createElement("script"),c=document.getElementsByTagName("script")[0];a.type="text/javascript",a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:274,div_id:"comm100-button-274"}),t.site_id=224768,t.main_code_plan=274,e("https://chatserver.comm100.com/livechat.ashx?siteId="),setTimeout(function(){t.loaded||e("https://hostedmax.comm100.com/chatserver/livechat.ashx?siteId=")},5e3)})(Comm100API||{})
</script>
<!--End Comm100 Live Chat Code-->


<script type="text/javascript">
    adroll_adv_id = "OJC4KGUO2JDGFORPQ2GDFM";
    adroll_pix_id = "Q3542TJAHBBJLOQABRRCTA";
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>
<script type="text/javascript">
/* <![CDATA[ * /
var google_conversion_id = 851218717;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> * /
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/851218717/?guid=ON&amp;script=0"/>
</div>
</noscript>
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"23001520"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><?php */?>
<?php $conn->close(); ?>