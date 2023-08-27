<?php 
include_once("adminpanel/database.php");
$query="select * from faqs where Status=1";
$ex=mysqli_query($conn,$query);


?>
<?php include_once("header.php"); ?>
  <link rel="stylesheet" href="assets/css/nioicon.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        html,* { font-family: 'Inter'; line-height: 1.6; }
        .con { margin: 50px auto; }
        .accordion-title { cursor: pointer; }
    </style>



    <div class="container con">
        <h1>FAQS</h1>
        <p class="lead"> recording question for Online Education Platform. </p>
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <?php while($s=mysqli_fetch_assoc($ex)) { ?>
                <ul class="accordion-list list-unstyled">
                    <li class="accordion-list-item px-3 py-2 mb-2" >
                        <h5 class="accordion-title d-flex justify-content-between" >
                            <?php echo $s['Question'] ; ?>
                            <span class="ni ni-minus"></span>
                        </h5>
                        <div class="accordion-desc">
                            <p class="pe-5 pt-3">
                            <?php echo $s['Answer'] ; ?>
                            </p>
                        </div>
                        
                     </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>



    <!-- Main Coding End -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Script JS -->
    <script src="assets/js/jquery-petty-accordion.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>


<?php include_once("footer.php");?>